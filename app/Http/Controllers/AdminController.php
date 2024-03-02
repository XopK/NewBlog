<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $all = News::with('category')->get();
        return view('admin.index', ['all' => $all]);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function edit($id)
    {
        $current = News::with('category')->where('id', $id)->first();
        $categories = Category::all();
        return view('admin.editNews', ['categories' => $categories, 'current' => $current]);
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

    public function update(Request $request, News $id)
    {
        $request->validate([
            "photo" => 'image',
        ], [
            "photo.image" => "Загрузите изображение!",
        ]);

        if ($request->file('photo')) {
            $name_news = $request->file('photo')->hashName();
            $path_news = $request->file('photo')->store('public/news');
        } else {
            $name_news = $id->photo;
        }

        $id->update([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $name_news,
            'category_id' => $request->category,
        ]);

        return redirect()->back()->with('success', 'Данные обновлены!');
    }

    public function delete(News $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Новость удалена!');
    }

    public function block(News $id)
    {
        $id->update([
            'is_blocked' => 1,
        ]);
        return redirect()->back()->with('success', 'Новость заблокирована!');
    }

    public function unblock(News $id)
    {
        $id->update([
            'is_blocked' => 0,
        ]);
        return redirect()->back()->with('success', 'Новость разблокирована!');
    }

    public function blockUser(User $id)
    {
        $id->update([
            'is_blocked' => 1,
        ]);
        return redirect()->back()->with('success', 'Пользователь заблокирован!');
    }

    public function unblockUser(User $id)
    {
        $id->update([
            'is_blocked' => 0,
        ]);
        return redirect()->back()->with('success', 'Пользователь разыблокирован!');
    }
}
