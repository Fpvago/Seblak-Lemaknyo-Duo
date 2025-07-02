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

        <?php if(empty($items)): ?>
            <p class="text-center text-gray-500">Keranjang kosong.</p>
        <?php else: ?>
            <ul class="divide-y divide-gray-300 mb-6">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="flex items-center justify-between py-3">
            <div>
                <p class="font-medium"><?php echo e($itemData['item']->name); ?></p>
                <div class="flex items-center space-x-2">
                    <form method="POST" action="<?php echo e(route('cart.decrease')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($itemData['item']->id); ?>">
                        <button class="px-2 bg-red-500 text-white rounded">–</button>
                    </form>

                    <span><?php echo e($itemData['quantity']); ?></span>

                    <form method="POST" action="<?php echo e(route('cart.increase')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($itemData['item']->id); ?>">
                        <button class="px-2 bg-green-500 text-white rounded">+</button>
                    </form>
                </div>
            </div>
            <div class="text-right text-[#EEA330] font-bold">
                Rp<?php echo e(number_format($itemData['subtotal'], 0, ',', '.')); ?>

            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

            <div class="mb-6 text-right text-lg font-bold">
                Total: Rp<?php echo e(number_format($total, 0, ',', '.')); ?>

            </div>

            <div class="text-center">
                <a href="/checkout" class="bg-[#FF6F00] text-white font-bold py-2 px-6 rounded-full hover:bg-orange-700 transition">
                    Lanjut ke Checkout
                </a>
            </div>
        <?php endif; ?>

        <div class="mt-6 text-center">
            <a href="/" class="text-[#FF6F00] hover:underline font-medium">← Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Website-pemesanan-seblak-lemaknyo - Copy\resources\views/cart.blade.php ENDPATH**/ ?>