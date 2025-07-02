<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Seblak Lemaknyo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#fef9e7] min-h-screen font-poppins text-gray-800">

    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center text-[#FF6F00] mb-6">Checkout</h1>

        @if (empty($items))
            <p class="text-center text-gray-600">Keranjang kosong.</p>
        @else
            <ul class="divide-y divide-gray-300 mb-6">
                @foreach ($items as $itemData)
                    <li class="flex items-center justify-between py-3">
                        <div>
                            <p class="font-medium">{{ $itemData['item']->name }}</p>
                            <p class="text-sm text-gray-500">x{{ $itemData['quantity'] }}</p>
                        </div>
                        <div class="text-right text-[#EEA330] font-bold">
                            Rp{{ number_format($itemData['subtotal'], 0, ',', '.') }}
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mb-6 text-right text-lg font-bold">
                Total: Rp{{ number_format($total, 0, ',', '.') }}
            </div>

            <form method="POST" action="/checkout">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nama Pemesan:</label>
                    <input type="text" name="customer_name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#EEA330]">
                </div>

                <div class="mb-6">
                    <label class="block mb-1 font-medium">Pilih Metode Pembayaran:</label>
                    <select name="payment_method" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#EEA330]">
                        <option value="kasir">Bayar di Kasir</option>
                        <option value="qris">QRIS (Online)</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-[#FF6F00] text-white font-bold py-2 px-6 rounded-full hover:bg-orange-700 shadow transition">
                        Konfirmasi Pesanan
                    </button>
                </div>
            </form>
        @endif

        <div class="mt-6 text-center">
            <a href="/" class="text-[#FF6F00] hover:underline font-medium">← Kembali ke Menu</a>
        </div>
    </div>

</body>
</html>
