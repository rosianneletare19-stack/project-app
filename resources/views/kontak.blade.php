<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alam Mayang Pekanbaru</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link href="/style.css" rel="stylesheet">
</head>
<body class="font-serif">

  <!-- Navbar -->
  <nav class="fixed top-0 z-50 bg-white w-full shadow-md">
    <div class="max-w-5xl mx-auto px-6 flex items-center justify-between h-[70px]">
      <!-- Logo -->
      <div class="flex items-center">
        <img class="h-14 md:h-16" src="assets/image/logoo.jpg" alt="logo alam mayang">
      </div>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex space-x-6 items-center">
        <li><a href="{{ route('index') }}" class="hover:text-green-700">Beranda</a></li>
        <li><a href="{{ route('blog.index') }}" class="hover:text-green-700">Berita</a></li>
        <li><a href="{{ route('tentang') }}" class="hover:text-green-700">Tentang</a></li>
        <li><a href="{{ route('kontak') }}" class="hover:text-green-700">Kontak</a></li>
      </ul>

      <!-- Menu Mobile -->
      <div class="md:hidden">
        <button id="menu-btn" class="text-3xl">
          <i class="ph ph-list"></i>
        </button>
      </div>
    </div>

    <!-- Dropdown Mobile -->
    <div id="menu-dropdown" class="hidden flex-col bg-white shadow-md md:hidden px-6 py-4 space-y-3">
      <a href="{{ route('index') }}" class="block hover:text-green-700">Beranda</a>
      <a href="{{ route('blog.index') }}" class="block hover:text-green-700">Berita</a>
      <a href="{{ route('tentang') }}" class="block hover:text-green-700">Tentang</a>
      <a href="{{ route('kontak') }}" class="block hover:text-green-700">Kontak</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative w-full h-[80vh] md:h-screen bg-[url('assets/image/coverr.png')] bg-cover bg-center flex justify-center items-center mt-[70px]">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center text-white">
      <h1 class="text-3xl md:text-5xl font-black">Kontak</h1>
    </div>
  </section>

  <!-- Kontak Section -->
  <section class="w-full py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        
        <!-- Info -->
        <div class="space-y-6">
          <h2 class="text-2xl font-semibold text-green-700">Terhubung dengan kami</h2>
          <p class="text-base text-gray-700">
            Sudah siap berlibur seru ke Taman Rekreasi Wisata Alam Mayang? Kami senang mendengar dari Anda!
          </p>

          <div class="space-y-3">
            <div class="flex items-center space-x-2">
              <i class="ph ph-instagram-logo text-2xl text-green-700"></i>
              <span>Follow akun Instagram kami</span>
            </div>
            <div class="flex items-center space-x-2">
              <i class="ph ph-whatsapp-logo text-2xl text-green-700"></i>
              <span>Hubungi kami melalui Whatsapp</span>
            </div>
            <div class="flex items-center space-x-2">
              <i class="ph ph-facebook-logo text-2xl text-green-700"></i>
              <span>Kunjungi halaman Facebook kami</span>
            </div>
          </div>
        </div>

        <!-- Form -->
        <div>
          <form action="#" method="POST" class="space-y-4">
            <div>
              <label class="block text-sm text-green-700">Nama</label>
              <input type="text" placeholder="Siapa Pengirim Email ini"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
              <label class="block text-sm text-green-700">Email</label>
              <input type="email" placeholder="Email ini"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
              <label class="block text-sm text-green-700">Pesan</label>
              <textarea rows="4" placeholder="Tulis pesan kamu di sini..."
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <button type="submit"
              class="w-full bg-green-700 text-white text-lg px-6 py-3 rounded-lg hover:bg-green-800 transition">
              Kirim Pesan
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
<footer class="w-full bg-black text-gray-300 py-12">
  <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

    <!-- Alamat -->
    <div class="bg-black p-4 pl-0 rounded-lg">
      <h3 class="text-lg font-semibold text-orange-500 mb-2">
        Alamat Kami
      </h3>
      <!-- Garis orange -->
      <div class="w-full h-[2px] bg-orange-500 mb-4"></div>
    
      <p class="text-sm mb-4">
        Jl. H. Imam Munandar KM. 8 Kelurahan Tangkerang Timur, Kecamatan Bukit Raya, Kota Pekanbaru, Riau
      </p>
      <img src="assets/image/maps.jpg" alt="Map" class="w-full h-32 object-cover mb-4">
      <p class="text-sm">Email: alammayangpekanbaru@gmail.com</p>
      <p class="text-sm">Telp: +62 812 - 7572 - 6809</p>
    </div>

    <!-- Jelajahi -->
    <div class="bg-black p-4 rounded-lg">
      <h3 class="text-lg font-semibold text-orange-500 mb-2 ">
        Jelajahi 
      </h3>
      <div class="w-full h-[2px] bg-orange-500 mb-4"></div>
      <ul>
      <li><a href="{{ route('index') }}" class="text-sm hover:text-orange-500">B E R A N D A</a></li>
      <li><a href="{{ route('tentang') }}" class="text-sm hover:text-orange-500">T E N T A N G</a></li>
      <li><a href="{{ route('kontak') }}" class="text-sm hover:text-orange-500">K O N T A K</a></li>
      </ul>
    </div>

    <!-- Jam Kerja -->
    <div class="bg-black p-4 rounded-lg">
      <h3 class="text-lg font-semibold text-orange-500 mb-2 ">
        Jam Kerja 
      </h3>
      <div class="w-full h-[2px] bg-orange-500 mb-4"></div>
      <p class="text-sm">EVERY DAY : 07:00 - 18:00</p>
    </div>

    <!-- Media Sosial -->
    <div class="bg-black p-4 pr-0 rounded-lg">
      <h3 class="text-lg font-semibold text-orange-500 mb-2 ">
        Media Sosial 
      </h3>
      <div class="w-full h-[2px] bg-orange-500 mb-4"></div>
      <div class="flex space-x-3 mt-2">
        <a href="#" class="bg-gray-200 text-black w-10 h-10 flex items-center justify-center rounded-md hover:bg-orange-500 hover:text-white transition">
          <i class="ph ph-facebook-logo text-xl"></i>
        </a>
        <a href="#" class="bg-gray-200 text-black w-10 h-10 flex items-center justify-center rounded-md hover:bg-orange-500 hover:text-white transition">
          <i class="ph ph-instagram-logo text-xl"></i>
        </a>
        <a href="#" class="bg-gray-200 text-black w-10 h-10 flex items-center justify-center rounded-md hover:bg-orange-500 hover:text-white transition">
          <i class="ph ph-tiktok-logo text-xl"></i>
        </a>
        <a href="#" class="bg-gray-200 text-black w-10 h-10 flex items-center justify-center rounded-md hover:bg-orange-500 hover:text-white transition">
          <i class="ph ph-whatsapp-logo text-xl"></i>
        </a>
      </div>
    </div>
  </div>
</footer>

  <!-- Script untuk toggle menu mobile -->
  <script>
    const menuBtn = document.getElementById("menu-btn");
    const menuDropdown = document.getElementById("menu-dropdown");

    menuBtn.addEventListener("click", () => {
      menuDropdown.classList.toggle("hidden");
      menuDropdown.classList.toggle("flex");
    });
  </script>

</body>
</html>
