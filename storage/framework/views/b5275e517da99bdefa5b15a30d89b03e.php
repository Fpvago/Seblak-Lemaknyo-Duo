<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Pesanan</h2>

<table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-[#FF6F00] text-white">
        <tr>
            <th class="px-4 py-2 text-left">Nama</th>
            <th class="px-4 py-2">Metode</th>
            <th class="px-4 py-2">Items</th>
            <th class="px-4 py-2">Total</th>
            <th class="px-4 py-2">Waktu</th>
        </tr>
    </thead>
    <tbody>
<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr class="border-b">
        <td class="px-4 py-2"><?php echo e($order->customer_name); ?></td>
        <td class="px-4 py-2"><?php echo e(strtoupper($order->payment_method)); ?></td>
        <td class="px-4 py-2 text-sm">
            <ul class="list-disc pl-5">
                <?php $__currentLoopData = json_decode($order->items, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item['name']); ?> x<?php echo e($item['quantity']); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </td>
        <td class="px-4 py-2 font-semibold text-right">Rp<?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
        <td class="px-4 py-2 text-sm text-gray-500"><?php echo e($order->created_at->format('d M Y H:i')); ?></td>
        <td class="px-4 py-2">
            <span class="px-2 py-1 text-xs rounded <?php echo e($order->status === 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800'); ?>">
                <?php echo e(ucfirst($order->status)); ?>

            </span>
        </td>
        <td class="px-4 py-2">
            <?php if($order->status !== 'completed'): ?>
                <form method="POST" action="<?php echo e(route('admin.orders.complete', $order->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Tandai Selesai
                    </button>
                </form>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr><td colspan="7" class="text-center p-4">Belum ada pesanan.</td></tr>
<?php endif; ?>
</tbody>

</table>

</body>
</html>
<?php /**PATH C:\laragon\www\Website-pemesanan-seblak-lemaknyo\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>