<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alam Mayang Pekanbaru</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  
  <!-- ✅ Tambahkan Open Graph Meta Tag -->
    <meta property="og:title" content="Selamat Datang di Alam Mayang Pekanbaru" />
    <meta property="og:description" content="Taman Rekreasi Alam Mayang Pekanbaru" />
    <meta property="og:image" content="https://alammayang.blk-pariwisata.my.id//assets/image/cover.png" />
    <meta property="og:url" content="https://alammayang.blk-pariwisata.my.id/" />
    <meta property="og:type" content="website" />

    <!-- ✅ Untuk Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Selamat Datang di Alam Mayang Pekanbaru" />
    <meta name="twitter:description" content="Taman Rekreasi Alam Mayang Pekanbaru" />
    <meta name="twitter:image" content="https://yourdomain.com/assets/image/cover.png" />
</head>

<body class="font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 z-50 bg-white w-full shadow-md">
    <div class="max-w-5xl mx-auto px-6 flex items-center justify-between h-[70px]">
      <!-- Logo -->
      <div class="flex items-center">
        <img class="h-14 md:h-16" src="assets/image/logoo.jpg" alt="logo alam mayang">
      </div>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex space-x-6 items-center font-serif">
        <li><a href="{{ route('index') }}" class="hover:text-green-700">Beranda</a></li>
        <li><a href="{{ route('blog.index') }}" class="hover:text-green-700">Berita</a></li>
        <li><a href="{{ route('tentang') }}" class="hover:text-green-700">Tentang</a></li>
        <li><a href="{{ route('kontak') }}" class="hover:text-green-700">Kontak</a></li>
      </ul>

      <!-- Menu Mobile -->
      <div class="md:hidden">
        <button id="menu-btn" class="text-2xl">
          <i class="ph ph-list"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Dropdown -->
  <div id="menu" class="hidden fixed top-[70px] left-0 w-full bg-white shadow-md md:hidden">
    <ul class="flex flex-col space-y-4 p-6 font-serif">
      <li><a href="{{ route('index') }}" class="hover:text-green-700">Beranda</a></li>
      <li><a href="{{ route('blog.index') }}" class="hover:text-green-700">Berita</a></li>
      <li><a href="{{ route('tentang') }}" class="hover:text-green-700">Tentang</a></li>
      <li><a href="{{ route('kontak') }}" class="hover:text-green-700">Kontak</a></li>
    </ul>
  </div>

  <!-- Hero Section -->
  <section class="relative w-full h-screen bg-[url('/assets/image/cover.png')] bg-cover bg-center flex justify-center items-center">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Content -->
    <div class="relative max-w-3xl mx-auto px-6 text-center text-white">
      <h1 class="text-3xl md:text-5xl font-serif font-black">Selamat Datang di Alam Mayang</h1>
      <p class="text-lg md:text-2xl mt-4 font-serif">Taman Wisata Rekreasi Pekanbaru</p>
    </div>
  </section>

  <!-- Panduan Wisata -->
  <section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-center mb-10">Panduan Wisata</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <?php for ($i = 0; $i < count($panduanWisataPost); $i++){ ?>
          <div class="bg-green-700 p-6 rounded-lg flex flex-col items-center text-center text-white shadow-lg">
            <i class="ph <?php echo $panduanWisataPost[$i]['icon']; ?> text-5xl"></i>
            <p class="mt-2 font-semibold"><?php echo $panduanWisataPost[$i]['judul']; ?></p>
            <p class="mt-2 font-serif text-sm"><?php echo $panduanWisataPost[$i]['deskripsi']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Destinasi Wisata -->
  <section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-center mb-10">Destinasi Wisata</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php for ($i = 0; $i < count($destinasiWisataPost); $i++){ 
          $img = $destinasiWisataPost[$i]['image']; ?>
          <div class="bg-green-700 text-white rounded-lg shadow-lg overflow-hidden">
            <img src="assets/image/<?php echo $img; ?>" alt="Wahana Air" class="w-full h-40 object-cover">
            <div class="p-4 text-center">
              <h3 class="font-semibold text-lg"><?php echo $destinasiWisataPost[$i]['title']; ?></h3>
              <p class="font-serif text-sm mt-2"><?php echo $destinasiWisataPost[$i]['description']; ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Fasilitas -->
  <section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-center mb-10">Fasilitas Alam Mayang</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php for ($i = 0; $i < count($fasilitasPost); $i++){ ?>
          <div class="bg-green-700 p-6 rounded-lg flex flex-col items-center text-center text-white shadow-lg">
            <i class="ph <?php echo $fasilitasPost[$i]['icon']; ?> text-5xl"></i>
            <p class="mt-2 font-semibold"><?php echo $fasilitasPost[$i]['title']; ?></p>
            <p class="mt-2 font-serif text-sm"><?php echo $fasilitasPost[$i]['description']; ?></p>
          </div>
        <?php } ?>
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

  <!-- Script untuk mobile menu -->
  <script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("menu");
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>
   <!-- Floating WhatsApp dengan pesan otomatis -->
  <a href="https://wa.me/6281275725908?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20wisata%20Alam%20Mayang" 
     target="_blank" 
     class="fixed bottom-5 right-5 bg-green-500 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:bg-green-600 transition">
    <i class="ph ph-whatsapp-logo text-3xl"></i>
  </a>
</body>
</html>
