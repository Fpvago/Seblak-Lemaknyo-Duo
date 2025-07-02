<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang - Seblak Lemaknyo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fef9e7] text-gray-800 font-sans">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center text-[#FF6F00] mb-6">Keranjang</h1>

        @if (empty($items))
            <p class="text-center text-gray-500">Keranjang kosong.</p>
        @else
            <ul class="divide-y divide-gray-300 mb-6">
                    @foreach ($items as $itemData)
        <li class="flex items-center justify-between py-3">
            <div>
                <p class="font-medium">{{ $itemData['item']->name }}</p>
                <div class="flex items-center space-x-2">
                    <form method="POST" action="{{ route('cart.decrease') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itemData['item']->id }}">
                        <button class="px-2 bg-red-500 text-white rounded">–</button>
                    </form>

                    <span>{{ $itemData['quantity'] }}</span>

                    <form method="POST" action="{{ route('cart.increase') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itemData['item']->id }}">
                        <button class="px-2 bg-green-500 text-white rounded">+</button>
                    </form>
                </div>
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

            <div class="text-center">
                <a href="/checkout" class="bg-[#FF6F00] text-white font-bold py-2 px-6 rounded-full hover:bg-orange-700 transition">
                    Lanjut ke Checkout
                </a>
            </div>
        @endif

        <div class="mt-6 text-center">
            <a href="/" class="text-[#FF6F00] hover:underline font-medium">← Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
