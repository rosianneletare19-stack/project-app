<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar - Taman Rekreasi Alam Mayang Pekanbaru</title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: 'Sansita Swashed', cursive;
      background: linear-gradient(to bottom right, #382c01ff, #fef3c7);
    }
  </style>
</head>

<body class="flex flex-col justify-between min-h-screen">
  <!-- Kontainer Utama -->
  <div class="flex justify-center items-center flex-grow px-4">
    <div
      class="flex flex-col lg:flex-row justify-center items-center max-w-5xl w-full mx-auto shadow-lg rounded-xl overflow-hidden bg-white">

      <!-- Gambar -->
      <div class="w-full lg:w-1/2 hidden lg:block">
        <img src="/assets/image/alam.png" alt="Taman Rekreasi Alam Mayang Pekanbaru"
          class="w-full h-auto rounded-lg shadow-lg">
      </div>

      <!-- Form Register -->
      <div class="w-full lg:w-1/2 p-8">
        <div class="text-center mb-6">
          <h2 class="text-3xl font-serif text-[#382c01ff]">Daftar Akun</h2>
          <p class="text-gray-600 font-serif text-sm mt-2">Taman Rekreasi Alam Mayang Pekanbaru</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
          @csrf
          @method('POST')

          <div>
            <label for="name" class="block text-sm font-serif text-gray-700">Nama Lengkap</label>
            <input id="name" type="text" name="name" required autocomplete="name"
              class="mt-2 block w-full rounded-md border border-gray-300 px-3 py-2 text-base text-gray-900 placeholder-gray-400 focus:border-[#0d9488] focus:ring-[#0d9488]" />
          </div>

          <div>
            <label for="email" class="block text-sm font-serif text-gray-700">Email</label>
            <input id="email" type="email" name="email" required autocomplete="email"
              class="mt-2 block w-full rounded-md border border-gray-300 px-3 py-2 text-base text-gray-900 placeholder-gray-400 focus:border-[#0d9488] focus:ring-[#0d9488]" />
          </div>

          <div>
            <label for="password" class="block text-sm font-serif text-gray-700">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
              class="mt-2 block w-full rounded-md border border-gray-300 px-3 py-2 text-base text-gray-900 placeholder-gray-400 focus:border-[#0d9488] focus:ring-[#0d9488]" />
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-serif text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
              autocomplete="new-password"
              class="mt-2 block w-full rounded-md border border-gray-300 px-3 py-2 text-base text-gray-900 placeholder-gray-400 focus:border-[#0d9488] focus:ring-[#0d9488]" />
          </div>

          <button type="submit"
            class="w-full bg-[#382c01ff] hover:bg-[#fef3c7] text-white font-serif py-2 rounded-md transition transform hover:scale-105">
            Daftar
          </button>

          <p class="text-center font-serif text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('Auth.login') }}" class="text-[#382c01ff] hover:text-[#fef3c7] font-serif">Masuk di sini</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w-full py-6 bg-[#382c01ff] text-white">
    <div class="max-w-5xl mx-auto px-4 text-center text-sm">
      © 2025 Taman Rekreasi Alam Mayang Pekanbaru. Semua Hak Dilindungi.
    </div>
  </footer>
</body>

</html>
