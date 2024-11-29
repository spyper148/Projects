<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Nette\Utils\Image;

class ServiceController extends Controller
{
    public function admin(): View
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }
    public function index(): View
    {
        $services = Service::all();
        return view('services', compact('services'));
    }
    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse //Добавление услуги
    {
        $filename = $request->file()['image']->getFileInfo()->getFilename() . '.' . $request->file()['image']->extension(); //Создание имени файла
        Storage::disk('public')->put('services/' . $filename, $request->file()['image']->getContent()); //Сохранение файла в систему

        Service::query()->create([ //Добавление услуги в базу данных
            'name' => $request->name,
            'price' => $request->price,
            'img' => 'services/' . $filename,
        ]);


        return redirect()->route('services.index'); //Переход на страницу с услугами
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse //Изменение услуги исключая картинки
    {
        $service->update([ //Изменение информации в базе
            'name' => $request->name,
            'price' => $request->price,
        ]);
        if ($request->file()) {
            Storage::disk('public')->delete($service->img);
            $filename = $request->file()['image']->getFileInfo()->getFilename() . '.' . $request->file()['image']->extension(); //Создание имени файла
            Storage::disk('public')->put('services/' . $filename, $request->file()['image']->getContent()); //Сохранение файла в систему
            $service->img = 'services/' . $filename;
            $service->save();
        }

        return redirect()->route('services.index');  //Переход на страницу с услугами
    }

    public function destroy(Service $service): RedirectResponse //Удаление услуги
    {
            Storage::disk('public')->delete($service->img); //Удаление из файлов
        $service->delete(); //Удаление услуги из базы
        return redirect()->route('services.index'); //Переход на страницу с услугами
    }

}
