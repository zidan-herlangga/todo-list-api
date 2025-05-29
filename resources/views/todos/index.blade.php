<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media screen and (max-width: 500px) {
      .kecil {
        display: flex;
        flex-direction: column;
      }
    }
  </style>
</head>
<body class="bg-gradient-to-tr from-blue-50 to-purple-100 min-h-screen p-6 font-sans">
  <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-3">
      <h1 class="text-2xl font-bold text-purple-700">Hi, {{ session('user.name') }}</h1>
      <form method="POST" action="/logout">
        @csrf
        <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded">Logout</button>
      </form>
    </div>

    <form method="POST" action="/todos" class="flex flex-col sm:flex-row items-center gap-2 mb-6">

      <div class="flex flex-col gap-3 w-full">
        @csrf
        <input name="title" type="text" placeholder="Tambah todo baru..."
          class="flex-col w-full sm:flex-1 border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
          required>
        <textarea name="description" rows="3" cols="" placeholder="Deskripsi (Opsional)"
          class="w-full sm:flex-1 border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
          required></textarea>
        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl transition">
          Tambah
        </button>
      </div>

    </form>

    <div class="space-y-4">
      @forelse($todoList as $todo)
      <div class="flex  kecil justify-between items-center bg-gray-100 p-4 rounded-xl shadow-sm">
        <div class="flex-col">
          <b>{{ $todo['title'] }}</b>
          <p class="mt-2 text-gray-800 break-words">{{ $todo['description'] }}</p>
        </div>
        <div class="flex gap-2">
          <a href="/todos/{{ $todo['id'] }}/edit"
            class="text-sm bg-blue-400 hover:bg-blue-500 text-white py-1 px-3 rounded transition">
            Edit
          </a>
          <form method="POST" action="/todos/{{ $todo['id'] }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm bg-red-400 hover:bg-red-500 text-white py-1 px-3 rounded transition">
              Hapus
            </button>
          </form>
        </div>
      </div>
      @empty
      <p class="text-center text-gray-500 italic">Belum ada todo bro!</p>
      @endforelse
    </div>
  </div>
</body>
</html>