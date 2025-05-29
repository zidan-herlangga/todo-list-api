<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.mockapi.base_url');
    }

    public function index()
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login');
        }

        $response = Http::get("{$this->baseUrl}/todos", [
            'userId' => $user['id']
        ]);

        $todoList = $response->json();

        if (!is_array($todoList)) {
            $todoList = [];
        }

        return view('todos.index', compact('todoList'));
    }

    public function store(Request $request)
    {
        $user = session('user');

        Http::post("{$this->baseUrl}/todos", [
            'title' => $request->title,
            'description' => $request['description'],
            'userId' => $user['id']
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->baseUrl}/todos/{$id}");
        $todo = $response->json();

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        Http::put("{$this->baseUrl}/todos/{$id}", [
            'title' => $request->title,
            'description' => $request['description']
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Http::delete("{$this->baseUrl}/todos/{$id}");
        return redirect('/');
    }
}
