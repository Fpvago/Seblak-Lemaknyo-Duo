<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Menu {{ ucfirst($category) }} - Seblak Lemaknyo</title>
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

    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center text-[#FF6F00] mb-8">
            Menu {{ ucfirst($category) }}
        </h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $item)
                <div class="bg-white shadow-lg rounded-lg p-5 border border-[#D3C850]">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->name }}</h2>
                    <p class="text-[#EEA330] font-bold mb-4">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                    <form method="POST" action="{{ route('add.to.cart') }}">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button type="submit"
                                class="w-full bg-[#FF6F00] text-white py-2 px-4 rounded hover:bg-orange-700 transition font-semibold">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="/" class="text-[#FF6F00] hover:underline font-medium">← Kembali ke Kategori</a> |
            <a href="/cart"
               class="inline-block bg-[#EEA330] text-white font-bold py-2 px-6 rounded-full hover:bg-[#ff9900] transition shadow">
                Lihat Keranjang
            </a>
        </div>
    </div>

</body>
</html>
