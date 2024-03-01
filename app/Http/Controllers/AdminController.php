<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.addNews', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "photo" => 'required|image',
            "category" => "required",
        ], [
            "title.required" => "Поле обязательно для заполнения!",
            "content.required" => "Поле обязательно для заполнения!",
            "photo.required" => "Поле обязательно для заполнения!",
            "photo.image" => "Загрузите изображение!",
            "category.required" => "Поле обязательно для заполнения!",
        ]);

        $name_news = $request->file('photo')->hashName();
        $path_news = $request->file('photo')->store('public/news');

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $name_news,
            'category_id' => $request->category,
            'is_blocked' => 0,
        ]);

        if ($news) {
            return redirect()->back()->with('success', 'Запись добавлена!');
        } else {
            return redirect()->back()->with('error', 'Ошибка добавления!');
        }
    }
}
