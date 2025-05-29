# 📝 Laravel 10 Todo List App (MockAPI)

Todo List App sederhana menggunakan Laravel 10 sebagai frontend dan [MockAPI](https://mockapi.io/) sebagai backend. Aplikasi ini memungkinkan pengguna untuk:
- Mendaftar dan login
- Menampilkan todo sesuai user
- Menambahkan, mengedit, dan menghapus todo

---

## 🔧 Teknologi yang Digunakan

- Laravel 10
- Blade Templating
- Tailwind (via CDN)
- MockAPI (sebagai REST API backend)

---

## 🚀 Fitur Aplikasi

- ✅ Registrasi dan Login pengguna
- ✅ Todo List CRUD
- ✅ Setiap user hanya melihat todo miliknya
- ✅ Frontend ringan dan cepat (tanpa build tools)

---

## 📦 Cara Install

```bash
# Clone repository
git clone https://github.com/zidan-herlangga/todo-list-api.git
cd todo-list-api

# Install dependency Laravel
composer install

# Salin file .env dan generate key
cp .env.example .env
php artisan key:generate

# Salin dan masukan kedalam file .env
MOCKAPI_URL=https://API-KAMU.mockapi.io

# Jalankan server
php artisan serve
```

---

## Konfigurasi MockAPI

1. Buka https://mockapi.io/

2. Buat project baru

3. Buat 2 resources:

    - `users` dengan field: 
      - name (String), 
      - email (String), 
      - password (String)

    - `todos` dengan field: 
      - title (String), 
      - description (String),
      - userId (Number)

Catat base URL MockAPI kamu (contoh: https://64f8ce7d824680fd216e99bd.mockapi.io)

Ganti base URL di file .env atau langsung di controller Laravel.

Contoh struktur data:

```json
// users
{
  "id": "1",
  "email": "name@mail.com",
  "password": "secret123"
}

// todos
{
  "id": "101",
  "title": "Belajar Laravel",
  "description": "Pelajari dasar-dasar Laravel",
  "userId": "1"
}
