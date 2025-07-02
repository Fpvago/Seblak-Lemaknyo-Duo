<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menuItems = [

            // Prasmanan
            ['name' => 'Sosis Ayam', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Sosis Salju', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Bakso Udang', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Bakso Ikan', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Otak Ikan', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Ceker', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Capit Kepiting', 'category' => 'prasmanan', 'price' => 1500],
            ['name' => 'Bakso Daging', 'category' => 'prasmanan', 'price' => 2000],
            ['name' => 'Sosis Sapi', 'category' => 'prasmanan', 'price' => 2000],
            ['name' => 'Odeng Panjang', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Enoki', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Ekor Udang', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Salmon Cidea', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Fish Roll', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Chikuwa', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Dumpling Ayam', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Dumpling Keju', 'category' => 'prasmanan', 'price' => 2500],
            ['name' => 'Stick Kepiting', 'category' => 'prasmanan', 'price' => 3000],
            ['name' => 'Tahu Bakso', 'category' => 'prasmanan', 'price' => 3000],
            ['name' => 'Sosis Super', 'category' => 'prasmanan', 'price' => 3000],
            ['name' => 'Sayap', 'category' => 'prasmanan', 'price' => 4000],
            ['name' => 'Bakso Urat', 'category' => 'prasmanan', 'price' => 6000],
            ['name' => 'Beef Enoki', 'category' => 'prasmanan', 'price' => 6000],
            ['name' => 'Ayam', 'category' => 'prasmanan', 'price' => 7000],

            // Topping
            ['name' => 'Kerupuk Udang Putih', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Kerupung Udang Oren', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Kerupuk Bawang', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Tahu Kering', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Rafael 4pcs', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Siomay Mini 4pcs', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Cuanki Tahu', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Sukro', 'category' => 'topping', 'price' => 1000],
            ['name' => 'Kerupuk Kepang', 'category' => 'topping', 'price' => 1500],
            ['name' => 'Makaroni', 'category' => 'topping', 'price' => 1500],
            ['name' => 'Kerupuk Mawar', 'category' => 'topping', 'price' => 1500],
            ['name' => 'Cuanki Pangsit', 'category' => 'topping', 'price' => 2000],
            ['name' => 'Kerupuk Goreng', 'category' => 'topping', 'price' => 5000],

            // Paketan
            ['name' => 'Seblak Premium', 'category' => 'paketan', 'price' => 15000],
            ['name' => 'Seblak Ayam', 'category' => 'paketan', 'price' => 15000],
            ['name' => 'Seblak Ceker', 'category' => 'paketan', 'price' => 15000],
            ['name' => 'Bakso Aci', 'category' => 'paketan', 'price' => 15000],

            // Minuman
            ['name' => 'Es Tawar', 'category' => 'minuman', 'price' => 1000],
            ['name' => 'Es Kosong', 'category' => 'minuman', 'price' => 1000],
            ['name' => 'Aqua Cup', 'category' => 'minuman', 'price' => 1000],
            ['name' => 'Es Saset', 'category' => 'minuman', 'price' => 2000],
            ['name' => 'Nutrisari', 'category' => 'minuman', 'price' => 3000],
            ['name' => 'Es Teh', 'category' => 'minuman', 'price' => 3000],
            ['name' => 'Aqua Botol', 'category' => 'minuman', 'price' => 4000],
            ['name' => 'Teh Pucuk', 'category' => 'minuman', 'price' => 5000],
            ['name' => 'Es Jeruk', 'category' => 'minuman', 'price' => 5000],
            ['name' => 'Gooday', 'category' => 'minuman', 'price' => 5000],
            ['name' => 'Teh Tarik', 'category' => 'minuman', 'price' => 5000],
            ['name' => 'Pop Ice', 'category' => 'minuman', 'price' => 5000],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
