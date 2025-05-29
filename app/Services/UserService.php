<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserService
{
  protected $baseUrl;

  public function __construct()
  {
    $this->baseUrl = config('services.mockapi.base_url');
  }

  public function authenticate($email, $password)
  {
    $response = Http::get("{$this->baseUrl}/users");
    $users = $response->json();

    foreach ($users as $user) {
      if ($user['email'] === $email && $user['password'] === $password) {
        return $user;
      }
    }

    return null;
  }

  public function register($data)
  {
    $response = Http::get("{$this->baseUrl}/users");
    $users = $response->json();

    // Cek email sudah terpakai
    foreach ($users as $user) {
      if ($user['email'] === $data['email']) {
        return null;
      }
    }

    // Simpan ke MockAPI
    $newUser = Http::post("{$this->baseUrl}/users", $data)->json();
    return $newUser;
  }

}
