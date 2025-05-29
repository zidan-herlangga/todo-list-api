<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-tr from-yellow-50 to-pink-100 min-h-screen p-6 font-sans">
  <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-xl font-bold text-pink-700 mb-6 text-center">Edit Todo</h2>

    <form method="POST" action="/todos/{{ $todo['id'] }}/update" class="space-y-4">
      <div class="flex flex-col gap-3">
        @csrf
        <input name="title" type="text" value="{{ $todo['title'] }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-400" required>
        
        <input name="description" type="text" value="{{ $todo['description'] }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-400" required>
      </div>


      <div class="flex justify-between">
        <a href="/" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-xl">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</body>

</html>