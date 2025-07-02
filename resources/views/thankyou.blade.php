<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih - Seblak Lemaknyo</title>
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

    <div class="max-w-xl mx-auto py-16 px-4 text-center">
        <h1 class="text-3xl font-bold text-[#FF6F00] mb-4">Terima Kasih 🎉</h1>

        <p class="text-lg mb-4">Pesanan atas nama <strong>{{ $name }}</strong> telah diterima.</p>
        <p class="text-md text-gray-700 mb-2">Total pembayaran: <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></p>
        <p class="text-md text-gray-700 mb-6">Metode pembayaran: <strong>{{ ucfirst($payment) }}</strong></p>

        <a href="/" class="inline-block mt-4 bg-[#EEA330] text-white font-bold py-2 px-6 rounded-full hover:bg-[#ff9900] transition shadow">
            Kembali ke Halaman Utama
        </a>
    </div>

</body>
</html>
