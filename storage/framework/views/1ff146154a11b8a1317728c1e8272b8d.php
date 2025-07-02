<!DOCTYPE html>
<html lang="id">
<head>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    [x-cloak] { display: none !important; }
</style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Seblak Lemaknyo - Kategori Menu</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">

    <!-- Tailwind Config -->
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
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none; /* IE/Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>

    <style>
        body {
            background-image: url('/images/Background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: brightness(0.9);
        }
    </style>
</head>

<body class="min-h-screen text-white font-poppins bg-black/40">

    <div class="bg-black bg-opacity-60 min-h-screen flex flex-col justify-center items-center px-4">
        <h1 class="text-4xl font-bold text-center mb-6">
            Selamat Datang di <span class="text-[#FF6F00]">Seblak Lemaknyo</span>
        </h1>

        <h2 class="text-2xl font-semibold mb-6 text-center">Pilih Kategori Menu:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-lg">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('/category/' . $category)); ?>"
                   class="block bg-[#EEA330] text-white text-lg font-semibold py-3 px-4 rounded-lg shadow-md hover:bg-[#ff9900] text-center capitalize transition">
                    <?php echo e($category); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-8 text-center">
            <a href="/cart"
               class="inline-block bg-[#FF6F00] text-white font-bold py-2 px-6 rounded-full hover:bg-orange-700 shadow-lg transition">
                Lihat Keranjang
            </a>
            <!-- Preview Tabs Section -->
<div x-data="{ tab: 'menu' }" class="mt-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Tabs -->
    <div class="border-b border-gray-300 mb-6 flex space-x-6 justify-center">
        <button @click="tab = 'menu'"
                :class="tab === 'menu' ? 'border-b-4 border-[#FF6F00] text-[#FF6F00]' : 'border-b-2 border-transparent text-gray-600'"
                class="pb-2 font-semibold transition-all duration-300">
            Menu Preview
        </button>

        <button @click="tab = 'best'"
                :class="tab === 'best' ? 'border-b-4 border-[#FF6F00] text-[#FF6F00]' : 'border-b-2 border-transparent text-gray-600'"
                class="pb-2 font-semibold transition-all duration-300">
            Best Seller
        </button>
    </div>

    <!-- Tab: Menu Preview -->
    <div x-show="tab === 'menu'" class="space-y-8">
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 place-items-center">
            <?php $__currentLoopData = $previews->take(36); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-[150px] bg-white rounded-lg shadow-md overflow-hidden text-center">
                    <img src="<?php echo e($item->image_url ?? '/images/seblak-bg.jpg'); ?>" alt="<?php echo e($item->name); ?>" class="w-full h-28 object-cover">
                    <div class="p-2">
                        <h3 class="text-sm font-semibold text-gray-800"><?php echo e($item->name); ?></h3>
                        <p class="text-xs text-gray-500 mb-2">Rp<?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                        <a href="/category/<?php echo e($item->category); ?>"
                           class="inline-block text-xs bg-[#EEA330] text-white font-semibold py-1 px-3 rounded hover:bg-[#ff9900] transition">
                            Pesan
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Show more button -->
        <?php if($previews->count() > 36): ?>
            <div class="text-center pt-6 mb-8">
    <a href="/category/prasmanan" class="inline-block bg-[#FF6F00] text-white font-bold py-2 px-6 rounded-full hover:bg-orange-700 transition">
        Lihat Lebih Banyak
    </a>
</div>

        <?php endif; ?>
    </div>

    <!-- Tab: Best Seller -->
<!-- Tab: Best Seller -->
<div x-show="tab === 'best'" x-cloak>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6 place-items-center">
        <?php $__currentLoopData = $bestsellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="w-[200px] bg-white rounded-xl shadow-lg overflow-hidden text-center">
            <img src="<?php echo e($item->image_url ?? '/images/seblak-bg.jpg'); ?>"
                 alt="<?php echo e($item->name); ?>"
                 class="w-full h-40 object-cover">

            <div class="p-4">
                <h3 class="text-base font-semibold text-gray-800"><?php echo e($item->name); ?></h3>
                <p class="text-sm text-gray-500 mb-2">Rp<?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                <a href="/category/<?php echo e($item->category); ?>"
                   class="inline-block text-sm bg-[#EEA330] text-white font-semibold py-1.5 px-4 rounded hover:bg-[#ff9900] transition">
                    Pesan
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Website-pemesanan-seblak-lemaknyo\resources\views/index.blade.php ENDPATH**/ ?>