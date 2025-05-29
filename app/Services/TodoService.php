<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TodoService
{
  protected $baseUrl;

  public function __construct()
  {
    $this->baseUrl = config('services.mockapi.base_url');
  }

  public function getAll()
{
    return Http::get("{$this->baseUrl}/todos")->json(); // <-- harus pakai ->json()
}


  public function getTodosByUser($userId)
  {
    return Http::get("{$this->baseUrl}/todos", [
      'userId' => $userId
    ])->json();
  }

  public function createTodo($data)
  {
    return Http::post("{$this->baseUrl}/todos", $data)->json();
  }

  public function getTodoById($id)
  {
    return Http::get("{$this->baseUrl}/todos/{$id}")->json();
  }

  public function updateTodo($id, $data)
  {
    return Http::put("{$this->baseUrl}/todos/{$id}", $data)->json();
  }


  public function deleteTodo($id)
  {
    return Http::delete("{$this->baseUrl}/todos/{$id}")->json();
  }
}
