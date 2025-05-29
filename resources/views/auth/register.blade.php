<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-pink-100 to-indigo-200 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">Register</h2>
    <form method="POST" action="/register" class="space-y-4">
      @csrf
      <input name="name" type="text" placeholder="Nama"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400" required>
      <input name="email" type="email" placeholder="Email"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400" required>
      <input name="password" type="password" placeholder="Password"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400" required>
      <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg">
        Register
      </button>
    </form>
    <p class="text-center text-sm mt-4">Sudah punya akun? <a href="/login" class="text-indigo-600 underline">Login</a>
    </p>
  </div>
</body>

</html>