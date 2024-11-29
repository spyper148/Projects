<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentImage;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $comments = Comment::query()->orderBy('created_at','DESC')->get();
        $images = CommentImage::all();
        return view('comments',compact('comments','images'));
    }
    public function admin():View
    {
        $comments = Comment::all();
        $images = CommentImage::all();
        return view('admin.comments.index',compact('comments','images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('comment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Добавления комментария
    {
        $comment = Comment::query()->create([ //Добавления данных комментария в базу
           'user_id' => Auth::user()->id,
            'text' => $request->text,
        ]);

        foreach ($request->file()['image'] as $image) { //Добавление картинок комментария
            $filename = $image->getFileInfo()->getFilename() . '.' . $image->extension(); //Создания имени файла изображения
            Storage::disk('public')->put('comments/' . $filename, $image->getContent()); //Сохранения файла в системе
            CommentImage::query()->create([ //Добавление инфомрмации о картинке в таблицу comment_images
                'img' => 'comments/'.$filename,
                'comment_id' => $comment->id,
                ]);

        }
        return redirect()->route('comments'); //Переход на главную страницу
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment) //Удаление комментариев
    {
        $images = CommentImage::query()->where('comment_id',$comment->id)->get(); //Получение всех картинок комментария
        foreach ($images as $image){ //Удаление каждой картинки
            $delete_file = str_replace('storage/','',$image->img); //Создание имени файла для удаления
            Storage::disk('public')->delete($delete_file); //Удаление файла картинки
            $image->delete(); //Удаление картинки из базы
        }
        $comment->delete(); //Удаление комментария
        return redirect()->route('comments.index'); //Переход на страницу с комментариями

    }
}
