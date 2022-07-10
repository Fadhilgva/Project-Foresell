<?php

namespace Database\Seeders;

use App\Models\AdminBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Courier;
use App\Models\Promotion;
use App\Models\PromotionBanner;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        // User::create([
        //     'name' => 'Fadhil',
        //     'email' => 'muhammadfadhil@if.uai.ac.id',
        //     'phone' => '081357638723',
        //     'password' => bcrypt("fadhil"),
        //     'address' => 'Masjid Agung Al-Azhar, Jl. Sisingamangaraja No.2, RT.2/RW.1, Selong, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110',
        //     'city' => 'DKI Jakarta',
        //     'postalcode' => '12110'
        // ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Category::create([
            'name' => 'Mobile Device',
            'slug' => 'mobile-device'
        ]);

        Category::create([
            'name' => 'Electronic',
            'slug' => 'electronic'
        ]);

        Store::create([
            'name' => 'Asus Official Store',
            'slug' => 'asus-official-store',
            'location' => 'Jakarta Utara',
            'address' => 'Jakarta Utara',
            'postalcode' => '13250',
            'user_id' => 1,
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates magni assumenda quam nobis explicabo recusandae iure quo tenetur, corporis provident? Veritatis incidunt sit recusandae distinctio odit temporibus enim debitis? A earum laboriosam quisquam non possimus exercitationem excepturi! Nisi modi, dolores corrupti id officia ipsam. Quidem ea cupiditate reprehenderit libero?"

        ]);

        Store::create([
            'name' => 'Sony Official Store',
            'slug' => 'sony-official-store',
            'location' => 'Jakarta Selatan',
            'address' => 'Jakarta Utara',
            'postalcode' => '13250',
            'user_id' => 1,
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates magni assumenda quam nobis explicabo recusandae iure quo tenetur, corporis provident? Veritatis incidunt sit recusandae distinctio odit temporibus enim debitis? A earum laboriosam quisquam non possimus exercitationem excepturi! Nisi modi, dolores corrupti id officia ipsam. Quidem ea cupiditate reprehenderit libero?"

        ]);

        Store::create([
            'name' => 'Samsung Official Store',
            'slug' => 'samsung-official-store',
            'location' => 'Jakarta Pusat',
            'address' => 'Jakarta Utara',
            'postalcode' => '13250',
            'user_id' => 1,
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates magni assumenda quam nobis explicabo recusandae iure quo tenetur, corporis provident? Veritatis incidunt sit recusandae distinctio odit temporibus enim debitis? A earum laboriosam quisquam non possimus exercitationem excepturi! Nisi modi, dolores corrupti id officia ipsam. Quidem ea cupiditate reprehenderit libero?"

        ]);

        Product::factory(20)->create();

        Promotion::factory(2)->create();

        PromotionBanner::factory(4)->create();

        AdminBank::create([
            'bankName' => 'BNI Virtual Account',
            'noRekening' => '8807 0813 5763 8723'
        ]);

        AdminBank::create([
            'bankName' => 'Gopay',
            'noRekening' => '0813 5763 8723'
        ]);

        AdminBank::create([
            'bankName' => 'OVO',
            'noRekening' => '0813 5763 8723'
        ]);

        AdminBank::create([
            'bankName' => 'Cash On Delivery',
            'noRekening' => 'Customer membayar pesanan secara langsung ketika pesanan tiba di tangan pembeli.'
        ]);

        Courier::create([
            'name' => 'J&T Express'
        ]);
        Courier::create([
            'name' => 'Ninja Xpress'
        ]);
        Courier::create([
            'name' => 'SiCepat Ekspres'
        ]);
        Courier::create([
            'name' => 'Lion Parcel'
        ]);
        Courier::create([
            'name' => 'JNE Express'
        ]);
    }
}
