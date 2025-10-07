<?php

// $object_panduan = [
//     [
//     'icon' => "ph-map-pin",
//     'title' => "Datang ke lokasi",
//     'description' => "Wisatawan harus sudah berada di lokasi"
//     ],
//     [
//     'icon' => "ph-ticket",
//     'title' => "Pembelian Tiket",
//     'description' => "Wisatawan diarahkan untuk membeli tiket"
//     ],
//     [
//     'icon' => "ph-building",
//     'title' => "Eksplor Wisata",
//     'description' => "Wisatawan mengunjungi destinasi alam mayang"
//     ],
//     [
//     'icon' => "ph-fork-knife",
//     'title' => "Menikmati Kuliner",
//     'description' => "Wisatawan bisa menikmati berbagai kuliner"
//     ],
//     [
//     'icon' => "ph-camera",
//     'title' => "Spot Foto",
//     'description' => "Wisatawan bisa menikmati berbagai spot foto"
//     ]   
//     ];

// $object_destinasi = [
//     [
//     'image' => "assets/image/wahana.png",
//     'title' => "Wahana Air",
//     'description' => "Pengunjung dapat menikmati permainan seperti sepeda air dan bebek air"
//     ],
//     [
//     'image' => "assets/image/bermain.png",
//     'title' => "Area Bermain",
//     'description' => "Terdapat fasilitas area bermain untuk anak-anak"
//     ],
//     [
//     'image' => "assets/image/foto.png",
//     'title' => "Spot Foto",
//     'description' => "Terdapat berbagai spot foto yang instagramable"
//     ],
//     [
//     'image' => "assets/image/mancing.png",
//     'title' => "Area Memancing",
//     'description' => "Terdapat tempat untuk memancing"
//     ]
//     ];

// $object_fasilitas =[
//     [
//     'icon' => "ph-toilet",
//     'title' => "Toilet",
//     'description' => "Tersedia toilet laki-laki dan perempuan"
//     ],
//     [
//     'icon' => "ph-microphone-stage",
//     'title' => "Panggung Hiburan",
//     'description' => "Tersedia panggung hiburan untuk karoke"
//     ],
//     [
//     'icon' => "ph-mosque",
//     'title' => "Musala",
//     'description' => "Tersedia tempat untuk beribadah"
//     ],
//     [
//     'icon' => "ph-letter-circle-p",
//     'title' => "Area Parkir",
//     'description' => "Tersedia area parkir yang luas dan nyaman"
//     ]
//     ];

// $object_faq = [
//     [
//     'question' => "Dimana lokasi Alam Mayang pekanbaru?",
//     'answer' => "Jl. H. Imam Munandar KM. 8 Kelurahan Tangkerang Timur, Kecamatan Bukit Raya, Kota Pekanbaru, Riau"
//     ],
//     [
//     'question' => "Apa saja metode pembayaran tiket di Alam Mayang?",
//     'answer' => "Uang tunas atau cash"
//     ],
//     [
//     'question' => "Berapa harga tiket masuk di Alam Mayang?",
//     'answer' => "Rp 15.000 hingga Rp 20.000"
//     ],
//     [
//     'question' => "Apa saja spot wisata yang ada di Alam Mayang?",
//     'answer' => "Wahana permainan air (bebek air, flying fox, banana boat), spot foto Instagramable (jembatan kayu, patung ikonik, miniatur candi, replika perahu Riau), taman bunga yang indah, dan wahana edukatif seperti planetarium dan pertunjukan astronomi"
//     ],
//     [
//     'question' => "Apakah ada biaya tambahan untuk tiap wisata di Alam Mayang?",
//     'answer' => "Ya, akan ada biaya tambahan di Taman Wisata Alam Mayang selain tiket masuk, terutama untuk menikmati wahana permainan tertentu seperti bebek air, serta biaya parkir kendaraan."
//     ]
//     ];
?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alam Mayang Pekanbaru</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link href='/style.css' rel='stylesheet'>
</head>
<body>
  <h1>Konten Website Taman Rekreasi Alam Mayang</h1>
  <hr>
  <nav class="fixed top-0 z-50 bg-[white] w-full h-[80px] flex items-center shadow-md">
    <div class="max-w-5xl mx-auto px-6 text-center w-full flex justify-between items-center px-6">
    <!-- Logo -->
    <div class="flex items-center h-full ">
        <img class="h-20" src="assets/image/logoo.jpg" alt="logo alam mayang">
    </div>
    <!-- Menu -->
    <ul class="flex space-x-6 items-center">
        <li><a href="index.php" class="text-[#0A400C] hover:text-[#AFE1AF]">Beranda</a></li>
        <li><a href="tentang.php" class="text-[#0A400C] hover:text-[#AFE1AF]">Tentang</a></li>
        <li><a href="kontak.php" class="text-[#0A400C] hover:text-[#AFE1AF]">Kontak</a></li>
        <li><button class="bg-[#CCE8B1] text-black px-3 py-1 rounded-lg cursor-pointer">ID</button></li>
        <li><button class="bg-white-300 text-black px-3 py-1 rounded-lg cursor-pointer">EN</button></li>
    </ul>
    </div>
  </nav> >

  <!-- Hero Section -->
  <section class="relative w-full h-screen bg-[url('assets/image/coverr.png')] bg-cover bg-center flex justify-center items-center">
  <!-- Overlay -->
  <div class="absolute inset-0"></div>

  <!-- Konten teks kiri -->
  <div class="absolute max-w-5xl mx-auto px-6 w-full h-full flex flex-col justify-center items-center space-y-10 pt-25 text-[#FFFFFF]">
    <h1 class="text-5xl md:text-5xl font-serif mb-4 b font-black">Selamat Datang di Alam Mayang</h1>
    <p class="text-4xl font-serif">
      Taman Wisata Rekreasi Pekanbaru
    </p>
  </div>
  </section>

  <section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-3xl font-extrabold text-center mb-10">Panduan Wisata</h2>
    <!-- Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 max-w-6xl mx-auto px-4 justify-items-center">
  <!-- Ikon Lokasi -->
        <?php 
        for ($i = 0; $i < count($panduanWisataPost); $i++){
          ?>
        <div class="bg-green-700 p-6 rounded-lg flex flex-col items-center text-center text-black shadow-lg">
          <i class="ph <?php echo $panduanWisataPost[$i]['icon']; ?> text-5xl"></i>
            <p class="mt-2 font-semibold"> <?php echo $panduanWisataPost[$i]['judul']; ?></p>
            <p class="mt-2 font-serif"> <?php echo $panduanWisataPost[$i]['deskripsi']; ?></p>
          </div>
        <?php } ?> 
    </div>
  </section>

  <section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4">
  <h2 class="text-3xl font-extrabold text-center mb-10">Destinasi Wisata</h2>
  <div class="grid grid-cols-5 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto px-4">
    <?php 
    for ($i = 0; $i < count($destinasiWisataPost); $i++){
      ?>
    <div class="bg-green-700 text-white rounded-lg shadow-lg overflow-hidden flex flex-col items-center">
      <img src="assets/image/<?php echo $destinasiWisataPost[$i]['image']; ?>" alt="Wahana Air" class="w-full h-40 object-cover">
      <div class="p-4 text-center">
        <h3 class="font-bold text-lg"> <?php echo $destinasiWisataPost[$i]['title']; ?></h3>
        <p class="text-sm mt-2"> <?php echo $destinasiWisataPost[$i]['description']; ?></p>
      </div>      
    </div>
    <?php } ?>
  </div>
</section>

<section class="py-10 bg-white">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-3xl font-extrabold text-center mb-10">Fasilitas Alam Mayang</h2>  
    <div class="grid grid-cols-5 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto px-4">
      <?php 
      for ($i = 0; $i < count($fasilitasPost); $i++){
        ?>
      <div class="bg-green-700 p-6 rounded-lg flex flex-col items-center text-center text-black shadow-lg">
        <i class="ph <?php echo $fasilitasPost[$i]['icon']; ?> text-5xl"></i>
        <p class="mt-2 font-semibold"> <?php echo $fasilitasPost[$i]['title']; ?></p>
        <p class="mt-2 font-serif"> <?php echo $fasilitasPost[$i]['description']; ?></p>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
 
<section class="w-full py-10 bg-white">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-extrabold text-center mb-10">FAQ</h2>
      <div class="space-y-4 text-left">
      <?php 
      for ($i = 0; $i < count($faqPost); $i++){
        ?>
        <div>
          <button class="bg-[#1E1E1E] text-white w-full px-6 py-4 flex justify-between items-center font-semibold cursor-pointer rounded">
            <?php echo $faqPost[$i]['question']; ?> <i class="ph ph-caret-down"></i></button>
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
      <ul class="space-y-1">
        <li><a href="#" class="text-sm hover:text-orange-500">B E R A N D A</a></li>
        <li><a href="#" class="text-sm hover:text-orange-500">T E N T A N G</a></li>
        <li><a href="#" class="text-sm hover:text-orange-500">K O N T A K</a></li>
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
 
</body>
</html>
