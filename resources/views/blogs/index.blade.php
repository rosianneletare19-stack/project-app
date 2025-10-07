<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alam Mayang Pekanbaru</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  <style>
    .font-script { font-family: 'Great Vibes', cursive; }
    .font-body { font-family: 'Quicksand', sans-serif; }
  </style>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="font-body bg-white">
  <!-- NAVBAR -->
  <nav class="fixed top-0 z-50 bg-white w-full shadow-md">
    <div class="max-w-5xl mx-auto px-6 flex items-center justify-between h-[70px]">
      <!-- Logo -->
      <div class="flex items-center">
        <img class="h-14 md:h-16" src="assets/image/logoo.jpg" alt="logo alam mayang">
      </div>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex space-x-6 font-serif">
        <li><a href="{{ route('index') }}" class="hover:text-green-700">Beranda</a></li>
        <li><a href="{{ route('blog.index') }}" class="hover:text-green-700">Berita</a></li>
        <li><a href="{{ route('tentang') }}" class="hover:text-green-700">Tentang</a></li>
        <li><a href="{{ route('kontak') }}" class="hover:text-green-700">Kontak</a></li>
      </ul>

      <!-- Menu Mobile Button -->
      <button id="menu-btn" class="md:hidden text-3xl focus:outline-none">
        <i class="ph ph-list"></i>
      </button>
    </div>

    <!-- Dropdown Mobile -->
    <div id="menu-mobile" class="hidden flex-col bg-white shadow-md md:hidden">
      <a href="{{ route('index') }}" class="px-6 py-3 hover:bg-gray-100">Beranda</a>
      <a href="{{ route('blog.index') }}" class="px-6 py-3 hover:bg-gray-100">Berita</a>
      <a href="{{ route('tentang') }}" class="px-6 py-3 hover:bg-gray-100">Tentang</a>
      <a href="{{ route('kontak') }}" class="px-6 py-3 hover:bg-gray-100">Kontak</a>
    </div>
  </nav>

    <!-- KONTEN BLOG -->
    <section class="w-full py-20 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <!-- Tombol Kembali -->
            <div class="flex mb-6">
                <a href="{{ route('index') }}"
                    class="w-auto px-4 h-10 flex items-center justify-center border rounded-lg bg-[#BACBB3] text-[#15803D] font-serif hover:opacity-80"><i class="ph ph-arrow-left mr-1"></i> Kembali
                </a>
            </div>
            @foreach ($blogs as $blog)
            <div class=" bg-[#BACBB3] rounded-lg shadow-md p-6 flex flex-col md:flex-row items-center gap-6 mb-8">
                <!-- Gambar -->
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{$blog->title}}" 
                class="w-full md:w-1/3 h-64 object-cover rounded-lg shadow">

                <!-- Deskripsi -->
                <div class="flex-1 text-left">
                    <h2 class="text-xl font-serif text-[#15803D] mb-2 ">{{ $blog->title }}</h2>
                    <p class="text-sm text-gray-600 font-serif mb-4">{{$blog->first()->category->first()->category->name}}</p>
                    <p class="text-[#0A400C] font-serif text-justify">{{ $blog->description }}</p>
                </div>
            </div>
            @endforeach

            <!-- PAGINATION -->
            <div class="mt-8 flex justify-center">
                {{ $blogs->links() }}
            </div>

            <!-- PAGINATION
            <div class="flex justify-center items-center mt-8 space-x-2">
                <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-lg bg-[#AEC8A4] hover:opacity-80">
                    <i class="ph ph-caret-left"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-lg bg-[#AEC8A4] text-[#0A400C] font-semibold">1</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-lg bg-[#AEC8A4] hover:opacity-80">2</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-lg bg-[#AEC8A4] hover:opacity-80">3</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-lg bg-[#AEC8A4] hover:opacity-80">
                    <i class="ph ph-caret-right"></i>
                </a>
            </div> -->
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
</body>

</html>