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
            'name' => 'cat',
            'slug' => 'cat',
            'description' => 'cats think about own yourself like a god',
            'image' => 'files/sKd23QVHwofIzt44rgWzIIfmkccrroaTGIYPGc4Y.jpg'
        ]);

        Category::create([
            'name' => 'dog',
            'slug' => 'dog',
            'description' => 'home home sweet home',
            'image' => 'files/WI2sVCf5iPhNOOyrcD1aIvZMvnJ4pqhm8LcqMlBk.png'
        ]);

        Category::create([
            'name' => 'hamster',
            'slug' => 'hamster',
            'description' => 'sweety food',
            'image' => 'files/xiOcXXZiEEvKmeaQ7S7hfWdqW3yIaFvi5LcG065n.jpg'
        ]);

        Category::create([
            'name' => 'rabbit',
            'slug' => 'rabbit',
            'description' => 'beautiful rabbit eating',
            'image' => 'files/02yLaoM5e00ytzNWag5Pj5FycaeQkRr6uDLXe88S.png'
        ]);

        Category::create([
            'name' => 'bird',
            'slug' => 'bird',
            'description' => 'great bird mama',
            'image' => 'files/dCYQtvMTLjjkFKwoMOOcnZSesndh3VEmYfsDEIk8.png'
        ]);

        Category::create([
            'name' => 'fish',
            'slug' => 'fish',
            'description' => 'sea lorem ipsum',
            'image' => 'files/gL3XJAur499olRKqr4WCC2pYMfLJzX02sjmowCXR.png'
        ]);

        Category::create([
            'name' => 'ginepig',
            'slug' => 'ginepig',
            'description' => 'this is a description',
            'image' => 'files/7FNM5wUHolHRB7kzB2csIFpC2vShZbasIhhTYkPE.jpg'
        ]);

        // Subcategory *********************************************************

        SubCategory::create([
            'name' => 'tasma',
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => 'yemek',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'yem kabı',
            'category_id' => 1,
        ]);


        SubCategory::create([
            'name' => 'tasma',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'Lucian Farley',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'Colby Strong',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'Chandler Matthews',
            'category_id' => 6,
        ]);

        SubCategory::create([
            'name' => 'Brent Benjamin',
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => 'Violet Ortiz',
            'category_id' => 7,
        ]);

        SubCategory::create([
            'name' => 'Celeste Hensley',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'Benjamin Vargas',
            'category_id' => 4,
        ]);

        SubCategory::create([
            'name' => 'Ethan Shelton',
            'category_id' => 6,
        ]);

        SubCategory::create([
            'name' => 'Meredith Bryan',
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => 'Willow Salinas',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'Jessica Terry',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'Margaret Bryan',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'Rhonda Farley',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'Hasad Reynolds',
            'category_id' => 6,
        ]);

        SubCategory::create([
            'name' => 'Nevada Giles',
            'category_id' => 4,
        ]);

        SubCategory::create([
            'name' => 'Phoebe Buchanan',
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => 'Hadassah Jimenez',
            'category_id' => 7,
        ]);

        // Product *********************************************************
            $max = rand(40,300);
        Product::create([
            'name' => 'random text',
            'image' => 'files/htUMUjCR8yxte6ve8BTut9r9YX8K15nnlldyrdgC.jpg',
            'price' => $max,
            'discount_price' =>rand(20,$max-5),
            'description' => 'Bu bir ürün açıklamasıdır.',
            'additional_info' => 'Ürün detayları hakkında bilgiler',
            'category_id' => rand(1,7),
            'subcategory_id' => rand(1,21)

            ]);
            $max = rand(40,300);
        Product::create([
                'name' => 'tarak',
                'image' => 'files/sKd23QVHwofIzt44rgWzIIfmkccrroaTGIYPGc4Y.jpg',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,6),
                'subcategory_id' => rand(1,21)
    
            ]);

        $max = rand(40,300);
        Product::create([
                'name' => 'makas',
                'image' => 'files/x3TbGnpPqNMPrT0FG9DwNCnSUXwCKF24QryprjWL.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);
            
        $max = rand(40,300);
        Product::create([
                'name' => 'Maryam Drake',
                'image' => 'files/x3TbGnpPqNMPrT0FG9DwNCnSUXwCKF24QryprjWL.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);

        $max = rand(40,300);
        Product::create([
                'name' => 'Ray Parsons',
                'image' => 'public/store/CpCUxFdoApcrVCYXWZziGbZCSODEfykk5yuFFqqs.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);

        $max = rand(40,300);
        Product::create([
            'name' => 'Christen Carlson',
            'image' => 'public/store/LCpMyq38iZ8XfS9j4w2GNowEEXXf1t8ZsCM2O9CX.jpg',
            'price' => $max,
            'discount_price' =>rand(20,$max-5),
            'description' => 'Bu bir ürün açıklamasıdır.',
            'additional_info' => 'Ürün detayları hakkında bilgiler',
            'category_id' => rand(1,3),
            'subcategory_id' => rand(1,21)

                ]);
        
        $max = rand(40,300);    
        Product::create([
                'name' => 'Orla Nielsen',
                'image' => 'public/store/AnHzymFKtEyP9upb7gw4E6Ri7Vj9iQSkrxb3ZcDM.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,6),
                'subcategory_id' => rand(1,21)
    
                ]);

        $max = rand(40,300);
        Product::create([
                'name' => 'makas',
                'image' => 'public/store/4DmNqCvHWzZhNjZjff9hIGhkCC5HhAVc6LQ921A0.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);
    
        $max = rand(40,300);
        Product::create([
                'name' => 'Christian Bennett',
                'image' => 'public/store/8MosDkWBsJh3PN7W5ksKvWoPrhNeGKCwIIDW2eZE.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);
    
        $max = rand(40,300);
        Product::create([
                'name' => 'Porter Massey',
                'image' => 'public/store/CdsVCO3QndwSISfrxjiYGL9HxhMOWTORE7SS7QHB.jpg',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
                ]);
        
        $max = rand(40,300);
        Product::create([
             'name' => 'Echo Cobb',
             'image' => 'public/store/Qn3TsrdA0yktDSt7pHXi0eyN2z1E4Ucvt1vDmceK.jpg',
             'price' => $max,
             'discount_price' =>rand(20,$max-5),
             'description' => 'Bu bir ürün açıklamasıdır.',
             'additional_info' => 'Ürün detayları hakkında bilgiler',
             'category_id' => rand(1,3),
             'subcategory_id' => rand(1,21)

             ]);
        
        $max = rand(40,300);       
        Product::create([
                'name' => 'Colette Hobbs',
                'image' => 'public/store/cdXrCvRgBYzr9sB99T9n8zoysMdGTkO9AfdGrZ3N.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,6),
                'subcategory_id' => rand(1,21)
    
                    ]);
        
        $max = rand(40,300);
        Product::create([
                'name' => 'Graham Michael',
                'image' => 'public/store/wGPa7MznWgi267vPvrb4AtBnik2S4es2DruTwFGW.png',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);
        
        $max = rand(40,300);    
        Product::create([
                'name' => 'Emerald Valencia',
                'image' => 'public/store/7PEmmclJKxeWH2DuGsiXs2LqU8fb3thqZFKzQGcb.jpg',
                'price' => $max,
                'discount_price' =>rand(20,$max-5),
                'description' => 'Bu bir ürün açıklamasıdır.',
                'additional_info' => 'Ürün detayları hakkında bilgiler',
                'category_id' => rand(1,3),
                'subcategory_id' => rand(1,21)
            ]);
        
        $max = rand(40,300);
        Product::create([
             'name' => 'Caryn Roach',
             'image' => 'public/store/pY1Rw8DhnpOJ5tNba3aUpmHrT9OL8TF434zrshJo.jpg',
             'price' => $max,
             'discount_price' =>rand(20,$max-5),
             'description' => 'Bu bir ürün açıklamasıdır.',
             'additional_info' => 'Ürün detayları hakkında bilgiler',
             'category_id' => rand(1,3),
             'subcategory_id' => rand(1,21)
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

        User::create ([
            'name' => 'Kamal',
            'email' => 'kamalharmon@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone' => '94353453',
            'is_admin' => 1
        ]);

        User::create ([
            'name' => 'Ryder',
            'email' => 'ryderpalmer@live.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone' => '94353453',
            'is_admin' => 1
        ]);
    }
}
