<?php

namespace Database\Seeders;
use App\Models\{User, Rates, Complaints, ComplaintImages};
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
        User::create([
            'name' => "Super Admin",
            'userType' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        

        Complaints::factory(50)->has(ComplaintImages::factory(), 'image')->create();
        Rates::factory(50)->create();
// 
        $barangay = User::create([
            'name' => "Bacayao Norte",
            'userType' => 'Barangay',
            'email' => 'bacayaonorte@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Bacayao Norte',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
// 
        $barangay = User::create([
            'name' => "Barangay I",
            'userType' => 'Barangay',
            'email' => 'barangay1@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Barangay I',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
// 
        $barangay = User::create([
            'name' => "Barangay II",
            'userType' => 'Barangay',
            'email' => 'barangay2@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Barangay II',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
// 
        $barangay = User::create([
            'name' => "Barangay IV",
            'userType' => 'Barangay',
            'email' => 'barangay4@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Barangay IV',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Bolosan",
            'userType' => 'Barangay',
            'email' => 'bolosan@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Bolosan',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Bonuan Binloc",
            'userType' => 'Barangay',
            'email' => 'bonuan_binloc@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Bonuan Binloc',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Bonuan Boqiug",
            'userType' => 'Barangay',
            'email' => 'bonuan_boquig@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Bonuan Boqiug',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Bonuan Gueset",
            'userType' => 'Barangay',
            'email' => 'bonuan_gueset@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Bonuan Gueset',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Calmay",
            'userType' => 'Barangay',
            'email' => 'calmay@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Calmay',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Carael",
            'userType' => 'Barangay',
            'email' => 'carael@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Carael',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        //
        $barangay = User::create([
            'name' => "Caranglaan",
            'userType' => 'Barangay',
            'email' => 'caranglaan@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Caranglaan',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
          //
          $barangay = User::create([
            'name' => "Herero",
            'userType' => 'Barangay',
            'email' => 'herero@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Herero',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
          //
          $barangay = User::create([
            'name' => "Lasip Chico",
            'userType' => 'Barangay',
            'email' => 'lasip_chico@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Lasip Chico',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
           //
           $barangay = User::create([
            'name' => "Lasip Grande",
            'userType' => 'Barangay',
            'email' => 'lasip_grande@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Lasip Grande',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        //
        $barangay = User::create([
            'name' => "Lomboy",
            'userType' => 'Barangay',
            'email' => 'lomboy@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Lomboy',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        //
        $barangay = User::create([
            'name' => "Lucao",
            'userType' => 'Barangay',
            'email' => 'lucao@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Lucao',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Malued",
            'userType' => 'Barangay',
            'email' => 'malued@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Malued',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Mamalingling",
            'userType' => 'Barangay',
            'email' => 'mamalingling@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Mamalingling',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Mangin",
            'userType' => 'Barangay',
            'email' => 'mangin@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Mangin',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Mayombo",
            'userType' => 'Barangay',
            'email' => 'mayombo@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Mayombo',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Pantal",
            'userType' => 'Barangay',
            'email' => 'pantal@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Pantal',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
          // 
          $barangay = User::create([
            'name' => "Poblacion Oeste",
            'userType' => 'Barangay',
            'email' => 'poblacion_oeste@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Poblacion Oeste',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Pogo Chico",
            'userType' => 'Barangay',
            'email' => 'pogo_chico@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Pogo Chico',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Pogo Grande",
            'userType' => 'Barangay',
            'email' => 'pogo_grande@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Pogo Grande',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Pugaro Suit",
            'userType' => 'Barangay',
            'email' => 'pugaro_suit@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Pugaro Suit',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Salapingao",
            'userType' => 'Barangay',
            'email' => 'salapingao@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Salapingao',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Salisay",
            'userType' => 'Barangay',
            'email' => 'salisay@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Salisay',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
                // 
        $barangay = User::create([
            'name' => "Tambac",
            'userType' => 'Barangay',
            'email' => 'tambac@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Tambac',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Tapuac",
            'userType' => 'Barangay',
            'email' => 'tapuac@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Tapuac',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);
        // 
        $barangay = User::create([
            'name' => "Tebeng",
            'userType' => 'Barangay',
            'email' => 'tebeng@barangay.com',
            'password' => Hash::make('password'),
        ]);
        $barangay->barangay()->create([
            'barangay'=>'Tebeng',
            'barangay_profile'=>'https://image.shutterstock.com/image-photo/angeles-pampanga-philippines-april-2022-260nw-2142693627.jpg',
            'population'=>'180000',
            'history'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In unde quisquam adipisci labore voluptatum saepe asperiores, maiores beatae. Optio facilis possimus dignissimos tempora excepturi amet aperiam ipsa veniam atque officia.',
        ]);

    }
}
