<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $houses = House::all();
        $images = HouseImage::all();
        return view('houses',compact('houses','images'));
    }

    public function admin():View
    {
        $houses = House::all();
        $images = HouseImage::all();
        return view('admin.houses.index',compact('houses','images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.houses.create');
    }


    public function store(Request $request):RedirectResponse  //  Добавление нового домика
    {
        $house = House::query()->create([   //Добавление данных о новом домике в базу данных
           'name'=>$request->name,
           'description' => $request->description,
            'min_size' => $request->min_size,
            'max_size' => $request->max_size,
            'price_weekdays_night' => $request->price_weekdays_night,
            'price_weekend_night' => $request->price_weekend_night,
            'price_weekdays_day' => $request ->price_weekdays_day,
            'price_weekend_day' => $request->price_weekend_day,

        ]);
        foreach ($request->file()['image'] as $image) {  //Добавление картинок
            $filename = $image->getFileInfo()->getFilename().'.'.$image->extension();  //Создание имени файла картинки
            Storage::disk('public')->put('houses/'.$filename,$image->getContent());  //Сохранение картинки в файловой системе
            HouseImage::query()->create([  //Добавление данных о картинке в таблицу house_images
                'img' => 'houses/'.$filename,
                'house_id' => $house->id,
            ]);
    }

        return redirect()->route('houses.index');  //Переход на страницу каталога
    }


    public function show(House $house)
    {
        //
    }


    public function edit(House $house):View
    {
        return view('admin.houses.edit',compact('house'));
    }


    public function update(Request $request, House $house) // Изменение данных о домике
    {
        $house->update([  //Добавление новы данных в базу исключая картинки
           'name' => $request->name,
           'description' => $request->description,
           'min_size' => $request->min_size,
           'max_size' => $request->max_size,
           'price_weekdays_day' => $request->price_weekdays_day,
            'price_weekdays_night' => $request->price_weekdays_night,
            'price_weekend_day' => $request->price_weekend_day,
            'price_weekend_night' => $request->price_weekend_night,
        ]);
        return redirect()->route('houses.index'); // Переход на страницу каталога
    }

    public function destroy(House $house)  //Удаление домика
    {
        $images = HouseImage::query()->where('house_id',$house->id)->get();  //Поиск всех картинок домика
        foreach ($images as $image){  //Удаление каждой картинки из таблицы house_images
            $delete_file = str_replace('storage/','',$image->img);
            Storage::disk('public')->delete($delete_file);
            $image->delete();
        }
        $house->delete();             //Удаление домика из базы
       return redirect()->route('houses.index'); //Переход на страницу каталога

    }
}
