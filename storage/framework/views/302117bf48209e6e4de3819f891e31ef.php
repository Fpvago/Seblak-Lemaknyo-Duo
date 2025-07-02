<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih - Pembayaran Kasir</title>
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

<body class="bg-[#fef9e7] min-h-screen font-poppins text-gray-800 flex items-center justify-center px-4">

    <div class="max-w-md text-center">
        <h1 class="text-3xl font-bold text-[#FF6F00] mb-4">Terima Kasih 🎉</h1>

        <p class="mb-2">Pesanan atas nama <strong><?php echo e($customer_name); ?></strong> telah diterima.</p>
        <p class="mb-4">Total: <strong>Rp<?php echo e(number_format($total_price, 0, ',', '.')); ?></strong></p>

        <p class="text-gray-700 mb-6">Silakan lanjut ke kasir untuk menyelesaikan pembayaran Anda.</p>

        <a href="/" class="inline-block mt-4 bg-[#EEA330] text-white font-bold py-2 px-6 rounded-full hover:bg-[#ff9900] transition shadow">
            Kembali ke Beranda
        </a>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\Website-pemesanan-seblak-lemaknyo - Copy\resources\views/thankyou_kasir.blade.php ENDPATH**/ ?>