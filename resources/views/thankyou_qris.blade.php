<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QRIS Pembayaran - Seblak Lemaknyo</title>
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

<body class="bg-[#fef9e7] min-h-screen font-poppins text-gray-800 flex flex-col justify-center items-center px-4">

    <div class="text-center max-w-md">
        <h1 class="text-3xl font-bold text-[#FF6F00] mb-4">Scan QRIS</h1>

        <p class="mb-2">Pesanan atas nama <strong>{{ $customer_name }}</strong></p>
        <p class="mb-4">Total pembayaran: <strong>Rp{{ number_format($total_price, 0, ',', '.') }}</strong></p>

        <div class="flex justify-center mb-6">
            <img src="/images/qris.jpg" alt="QRIS Code" class="w-64 h-64 object-contain border-4 border-[#EEA330] rounded-lg shadow-lg">
        </div>

        <p class="text-gray-600 text-sm mb-4">Silakan scan QR code ini menggunakan aplikasi e-wallet Anda.</p>

        <a href="/" class="inline-block mt-4 bg-[#EEA330] text-white font-bold py-2 px-6 rounded-full hover:bg-[#ff9900] transition shadow">
            Kembali ke Beranda
        </a>
    </div>

</body>
</html>
