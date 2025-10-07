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

      <!-- Button Mobile -->
      <button id="menu-btn" class="md:hidden text-3xl">
        <i class="ph ph-list"></i>
      </button>
    </div>

    <!-- Dropdown Menu Mobile -->
    <div id="menu-dropdown" class="hidden flex-col bg-white shadow-md px-6 py-4 space-y-3 md:hidden">
      <a href="{{ route('index') }}" class="block hover:text-green-700">Beranda</a>
      <a href="{{ route('blog.index') }}" class="block hover:text-green-700">Berita</a>
      <a href="{{ route('tentang') }}" class="block hover:text-green-700">Tentang</a>
      <a href="{{ route('kontak') }}" class="block hover:text-green-700">Kontak</a>
    </div>
  </nav>  

  <!-- Hero Section -->
  <section class="relative w-full h-[70vh] md:h-screen bg-[url('assets/image/coverr.png')] bg-cover bg-center flex justify-center items-center mt-[70px]">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center text-white px-4">
      <h1 class="text-3xl md:text-5xl font-black">Informasi Alam Mayang</h1>
    </div>
  </section>

  <!-- Sejarah -->
  <section class="w-full py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4 md:px-6 text-left">
      <h5 class="text-xl font-semibold text-green-700 mb-3">Sejarah Alam Mayang</h5>
      <p class="text-justify leading-relaxed">
        Taman Rekreasi Alam Mayang didirikan pada tahun 1970-an dan menjadi salah satu objek wisata keluarga pertama di Kota Pekanbaru. 
        Pada awalnya, kawasan ini hanyalah lahan dengan danau buatan yang dimanfaatkan sebagai tempat pemancingan. 
        Seiring dengan meningkatnya minat masyarakat, pengelola mulai mengembangkan berbagai fasilitas penunjang, seperti wahana permainan air, 
        area bersantai, dan taman rekreasi keluarga. Dengan luas area mencapai puluhan hektar, Alam Mayang kemudian berkembang menjadi destinasi wisata populer 
        yang memadukan suasana alam asri dengan rekreasi modern. Hingga kini, Alam Mayang tetap menjadi ikon wisata Pekanbaru yang diminati masyarakat lokal 
        maupun wisatawan dari luar daerah.
      </p>
    </div>
  </section>

  <!-- Latar Belakang -->
  <section class="w-full py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4 md:px-6 text-left">
      <h5 class="text-xl font-semibold text-green-700 mb-3">Latar Belakang Alam Mayang</h5>
      <p class="text-justify leading-relaxed">
        Taman Rekreasi Alam Mayang merupakan salah satu destinasi wisata keluarga terbesar di Kota Pekanbaru yang sudah berdiri sejak tahun 1970-an. 
        Kawasan ini menghadirkan suasana alam yang asri dengan danau buatan, pepohonan rindang, serta berbagai fasilitas rekreasi seperti pemancingan, permainan air, 
        dan wahana anak-anak. Selain menjadi tempat hiburan, Alam Mayang juga berfungsi sebagai ruang terbuka hijau yang penting bagi kota serta mendukung perekonomian lokal 
        melalui sektor pariwisata. Dengan lokasinya yang strategis dan mudah dijangkau, Alam Mayang terus menjadi ikon wisata Pekanbaru yang digemari masyarakat maupun wisatawan dari luar daerah.
      </p>
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

  <!-- Script Toggle Mobile Menu -->
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
