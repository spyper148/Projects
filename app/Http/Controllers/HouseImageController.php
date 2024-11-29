<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HouseImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,House $house) //Добавление картинок уже сущесвтующему домику
    {
        $filename = $request->file()['image']->getFileInfo()->getFilename().'.'.$request->file()['image']->extension();  // Создание имени файла
        Storage::disk('public')->put('houses/'.$filename,$request->file()['image']->getContent()); // Сохранение файла на диске
        HouseImage::query()->create([     //Запись пути новой картинки в базу
            'house_id'=>$house->id,
            'img' => 'houses/'.$filename,
        ]);
        return redirect()->route('houseImage.edit',$house);    //Переход на страницу изменения картинок домика
    }

    /**
     * Display the specified resource.
     */
    public function show(HouseImage $houseImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house):View
    {
        $images = HouseImage::query()->where('house_id',$house->id)->get();
        return view('admin.houses.images.edit',compact('images','house'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HouseImage $houseImage, House $house) //Изменение картинок домика
    {
        $delete_file = str_replace('storage/','',$houseImage->img); //Название удаляемого файла
        $filename = $request->file()['picture']->getFileInfo()->getFilename().'.'.$request->file()['picture']->extension(); //Название нового файла
        Storage::disk('public')->delete($delete_file); //Удаление старой картинки из файлов
        Storage::disk('public')->put('houses/'.$filename,$request->file()['picture']->getContent()); //Добавление новой картинки в файлы

        $houseImage->update([               //Изменение пути к файлу в базе
           'img' => 'houses/'.$filename,
        ]);

        return redirect()->route('houseImage.edit',$house); //Переход на страницу изменения картинок домика


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HouseImage $houseImage,House $house) //Удаление картинки
    {
        Storage::disk('public')->delete($houseImage->img);
        $houseImage->delete(); //Удаление картинки из базы данных

        return redirect()->route('houseImage.edit',$house); //Переход на страницу изменения картинок домика
    }
}
