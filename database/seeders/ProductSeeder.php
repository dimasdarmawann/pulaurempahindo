<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([

            // ── EIG (EAST INDIES GIN) ──
            [
                'name'        => 'Eig Indies Gin Bali Pink Pomelo',
                'description' => 'East Indies Gin Bali Pink Pomelo adalah gin premium yang lahir dari kekayaan botanicals tropis Indonesia. Diinfusi dengan pomelo merah muda segar khas Bali, gin ini menghadirkan aroma sitrus yang cerah dan segar berpadu harmonis dengan juniper dan rempah-rempah pilihan. Cocok dinikmati sebagai gin & tonic dengan es batu dan irisan pomelo segar.',
                'category'    => 'Gin',
                'origin'      => 'Bali, Indonesia',
                'volume'      => '700 ml',
                'abv'         => '40%',
                'price'       => 450000,
                'image'       => 'eig_pink_pomelo.jpg',
                'featured'    => true,
            ],
            [
                'name'        => 'Eig Indies Archipelago Gin',
                'description' => 'East Indies Gin Archipelago adalah ekspresi klasik dari gin buatan Bali yang terinspirasi dari jalur rempah Nusantara. Perpaduan juniper pilihan dengan botanicals lokal seperti serai, jahe, dan kayu manis menciptakan gin dengan karakter yang kuat namun seimbang. Ideal untuk berbagai kreasi cocktail premium.',
                'category'    => 'Gin',
                'origin'      => 'Bali, Indonesia',
                'volume'      => '700 ml',
                'abv'         => '40%',
                'price'       => 420000,
                'image'       => 'eig_archipelago.jpg',
                'featured'    => true,
            ],
            [
                'name'        => 'Eig Indies Banda Spiced Gin',
                'description' => 'East Indies Gin Banda Spiced menghadirkan kekayaan rempah-rempah khas kepulauan Banda dalam setiap tetes. Infusi rempah pilihan seperti pala, jintan, dan kayu manis memberikan karakter yang kaya dan kompleks, menjadikan gin ini sempurna untuk cocktail yang lebih berani dan beraroma.',
                'category'    => 'Gin',
                'origin'      => 'Bali, Indonesia',
                'volume'      => '700 ml',
                'abv'         => '40%',
                'price'       => 450000,
                'image'       => 'eig_banda_spiced.jpg',
                'featured'    => false,
            ],

            // ── SKYY VODKA ──
            [
                'name'        => 'SKY Vodka Original',
                'description' => 'SKY Vodka adalah vodka premium asal San Francisco yang telah memenangkan berbagai penghargaan internasional. Diproses melalui destilasi empat kali dan disaring tiga kali menggunakan teknologi terdepan, menghasilkan vodka yang luar biasa bersih, smooth, dan bebas dari rasa yang tidak diinginkan. Sempurna dinikmati dingin atau sebagai dasar cocktail premium.',
                'category'    => 'Vodka',
                'origin'      => 'San Francisco, USA',
                'volume'      => '700 ml',
                'abv'         => '40%',
                'price'       => 380000,
                'image'       => 'sky_vodka.jpg',
                'featured'    => true,
            ],

            // ── BACARDI ──
            [
                'name'        => 'Bacardi Carta Blanca',
                'description' => 'Bacardi Carta Blanca adalah rum putih ikonik yang telah menjadi standar kualitas selama lebih dari 150 tahun. Dibuat dari molases tebu pilihan terbaik dengan proses fermentasi unik menggunakan ragi rahasia keluarga Bacardi, menghasilkan rum yang ringan, bersih, dan halus. Rum terpilih untuk Mojito, Daiquiri, dan berbagai cocktail klasik dunia.',
                'category'    => 'Rum',
                'origin'      => 'Puerto Rico',
                'volume'      => '700 ml',
                'abv'         => '37.5%',
                'price'       => 400000,
                'image'       => 'bacardi_carta_blanca.jpg',
                'featured'    => true,
            ],
            [
                'name'        => 'Bacardi Spiced Rum',
                'description' => 'Bacardi Spiced Rum adalah rum yang diberi rasa rempah-rempah khas, menghasilkan cita rasa yang kaya dan kompleks. Dibuat dengan campuran rempah alami yang diolah secara tradisional, rum ini sempurna dinikmati neat, on the rocks, atau dalam cocktail rum klasik seperti Cuba Libre.',
                'category'    => 'Rum',
                'origin'      => 'Puerto Rico',
                'volume'      => '700 ml',
                'abv'         => '37.5%',
                'price'       => 420000,
                'image'       => 'bacardi_spiced_rum.jpg',
                'featured'    => false,
            ],

            // ── HAPPY SOJU ──
            [
                'name'        => 'Andong Green Tea',
                'description' => 'Andong Green Tea adalah soju Korea yang ringan dan menyegarkan dengan cita rasa bersih yang telah dicintai jutaan orang. Dibuat menggunakan proses destilasi modern yang menghasilkan soju dengan karakter smooth dan finish yang bersih. Sempurna dinikmati dingin langsung dari botol atau dicampur dengan bir untuk pengalaman minum yang menyenangkan.',
                'category'    => 'Soju',
                'origin'      => 'Korea Selatan',
                'volume'      => '360 ml',
                'abv'         => '16.9%',
                'price'       => 85000,
                'image'       => 'andong_green_tea.jpg',
                'featured'    => false,
            ],
            [
                'name'        => 'Andong Original',
                'description' => 'Andong Original berasal dari kota Andong, pusat tradisi soju premium Korea Selatan yang telah berusia berabad-abad. Dibuat menggunakan metode tradisional yang diwariskan turun-temurun dengan bahan-bahan lokal pilihan, menghasilkan soju dengan karakter yang lebih kuat, kompleks, dan autentik dibanding soju modern biasa.',
                'category'    => 'Soju',
                'origin'      => 'Andong, Korea Selatan',
                'volume'      => '500 ml',
                'abv'         => '22%',
                'price'       => 150000,
                'image'       => 'andong_original.jpg',
                'featured'    => true,
            ],

            // ── NUSANTARA COLD BREW ──
            [
                'name'        => 'Nusantara Cold Brew Coffee Liqueur',
                'description' => 'Nusantara Cold Brew adalah minuman kopi premium yang merayakan kekayaan kopi Nusantara. Dibuat dari biji kopi single origin pilihan terbaik Indonesia yang diproses melalui metode cold brew selama 24 jam dalam suhu dingin terkontrol. Menghasilkan kopi dengan rasa yang kaya, smooth, rendah asam, dan memiliki aftertaste yang panjang dan menyenangkan.',
                'category'    => 'Cold Brew',
                'origin'      => 'Indonesia',
                'volume'      => '200 ml',
                'abv'         => '0%',
                'price'       => 45000,
                'image'       => 'nusantara_cold_brew.jpg',
                'featured'    => true,
            ],

            // ── LITTLE RIVER ──
            [
                'name'        => 'Little River Whisky',
                'description' => 'Little River Whisky adalah whisky premium dengan filosofi accessible luxury — kemewahan yang dapat dinikmati semua orang. Perpaduan grain dan malt yang dipilih dengan cermat menghasilkan whisky dengan notes vanilla yang lembut, caramel yang manis, dan sentuhan oak yang subtle. Sempurna dinikmati neat, on the rocks, atau sebagai dasar highball yang elegan.',
                'category'    => 'Whisky',
                'origin'      => 'Australia',
                'volume'      => '700 ml',
                'abv'         => '40%',
                'price'       => 520000,
                'image'       => 'little_river_whisky.jpg',
                'featured'    => true,
            ],
        ]);
    }
}
