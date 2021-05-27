<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name' => 'dizüstü pc',
            'slug' => 'dizustu-pc',
            'description' => 'dizüstü bilgisayar kategorisi',
            'image' => 'files/02yLaoM5e00ytzNWag5Pj5FycaeQkRr6uDLXe88S.png'
        ]);

        Category::create([
            'name' => 'mama',
            'slug' => 'mama',
            'description' => 'kedi maması',
            'image' => 'files/7FNM5wUHolHRB7kzB2csIFpC2vShZbasIhhTYkPE.jpg'
        ]);

        SubCategory::create([
            'name' => 'tasma',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'yemek',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'yem kabı',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'random text',
            'image' => 'files/htUMUjCR8yxte6ve8BTut9r9YX8K15nnlldyrdgC.jpg',
            'price' => rand(700,1000),
            'description' => 'Bu bir ürün açıklamasıdır.',
            'additional_info' => 'Ürün detayları hakkında bilgiler',
            'category_id' => rand(1,3),
            'subcategory_id' => 3

            ]);
        
        Product::create([
                'name' => 'tarak',
                'image' => 'files/sKd23QVHwofIzt44rgWzIIfmkccrroaTGIYPGc4Y.jpg',
                'price' => rand(700,1000),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,6),
                'subcategory_id' => 1
    
            ]);

        Product::create([
                'name' => 'makas',
                'image' => 'files/x3TbGnpPqNMPrT0FG9DwNCnSUXwCKF24QryprjWL.png',
                'price' => rand(700,1000),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => 2
            ]);

        User::create ([
            'name' => 'hakan',
            'email' => 'hakan.cakmak@live.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone' => '94353453',
            'is_admin' => 1
        ]);
    }
}
