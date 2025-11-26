<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Tiket - Candi Muara Takus</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="font-[Poppins] bg-gray-100">
  
    @include('navbar')

    <section class="py-10 mt-24 px-4">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="p-6 md:p-8 border-b border-gray-200">
        <h1 class="text-2xl md:text-3xl font-semibold text-[#282414] mb-2">Pesanan Tiket Anda</h1>
        <p class="text-sm text-gray-600">Order ID : {{ $order->invoice_number }}</p>
      </div>

      <div class="p-6 md:p-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between p-5 bg-gray-50 rounded-xl border border-gray-200 mb-6">
              <div class="flex-1">
                <p class="text-sm text-gray-500 uppercase tracking-wide font-medium">Tiket Wisata</p>
                                <h3 class="text-xl font-semibold text-[#282414] mb-2">Candi Muara Takus</h3>
                <p class="text-sm text-gray-600">Tanggal Kunjungan: {{ \Carbon\Carbon::parse($order->date_of_visit)->format('d F Y') }}</p>
              </div>
              <div class="mt-4 md:mt-0 text-right">
                <p class="text-xl md:text-2xl font-semibold text-[#585D27]">Rp
                  {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                <span
                  class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $order->payment_status == 'success' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} mt-1">
                  {{ $order->payment_status == 'success' ? 'Lunas' : ucfirst($order->payment_status) }}
                </span>
              </div>
            </div>

                        <div class="bg-gray-50 rounded-xl p-6">
              <h3 class="text-lg font-semibold text-[#282414] mb-4">Ringkasan Pesanan</h3>
              <div class="space-y-3 text-sm md:text-base">
                <div class="flex justify-between">
                                      <span>Tiket {{ $order->orderItem?->product?->product_name ?? 'N/A' }}</span>
                  <span>Rp {{ number_format($order->orderItem?->price ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                  <span>Quantity</span>
                  <span>{{ $order->orderItem?->quantity ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between">
                  <span>Subtotal</span>
                  <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
                <hr class="border-gray-300">
                <div class="flex justify-between font-semibold text-[#282414] text-base md:text-lg">
                  <span>Total</span>
                  <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
              </div>
            </div>
          </div>

                    <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-5">
              <h3 class="text-lg font-semibold text-[#282414] mb-4">Pelanggan</h3>
              <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">{{ $order->customer->name }}</p>
                  <p class="text-sm text-gray-500">{{ $order->orderItem?->quantity ?? 0 }} Tiket</p>
                </div>
              </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-5">
              <h3 class="text-lg font-semibold text-[#282414] mb-4">Informasi Pelanggan</h3>
              <div class="space-y-3 text-sm">
                <div class="flex items-center space-x-2">
                  <i class="ph ph-envelope text-gray-500"></i>
                  <span class="text-gray-700">{{ $order->customer->email }}</span>
                </div>
                <div class="flex items-center space-x-2">
                  <i class="ph ph-phone text-gray-500"></i>
                  <span class="text-gray-700">{{ $order->customer->phone ?? 'No. HP tidak ada' }}</span>
                </div>
              </div>
            </div>

                        @if ($order->payment_status === 'pending' || $order->payment_status === 'failed')
            <button id="pay-button"
              class="w-full bg-[#585D27] hover:bg-[#3d421b] text-white font-semibold py-3 px-6 rounded-xl transition duration-300 shadow-md hover:scale-95">
              Bayar Sekarang
            </button>
            @elseif ($order->payment_status === 'success')
                        <a href="{{ route('ticket.download', $order) }}"
              class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 shadow-md hover:scale-95">
              <i class="ph ph-download-simple mr-1"></i> Unduh Tiket (PDF)
            </a>
            @endif
                      </div>
        </div>
      </div>
    </div>
  </section>

    @include('footer')

    @if ($order->payment_status === 'pending' || $order->payment_status === 'failed')
  <script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
      // Validasi snap token
      if ('{{ $snap_token }}' === '') {
          alert('Gagal memuat detail pembayaran. Silakan muat ulang halaman.');
          return;
      }

      snap.pay('{{ $snap_token }}', {
        onSuccess: function(result) {
          // Arahkan kembali ke halaman ini untuk refresh status
          alert('Pembayaran berhasil!');
          window.location.href = "{{ route('view-detail-ticket', $order) }}";
        },
        onPending: function(result) {
          alert('Pembayaran tertunda. Selesaikan pembayaran Anda.');
          window.location.href = "{{ route('view-detail-ticket', $order) }}";
        },
        onError: function(result) {
          alert('Pembayaran gagal. Silakan coba lagi.');
        }
      });
    };
  </script>
  @endif
  </body>
</html>