<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Gender;
use App\Models\Delivery;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@gradea.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin'
        ]);

        $categories = ['Shoes','Blouse', 'Bags', 'Trousers', 'Shirts'];
        foreach($categories as $category){
            Category::firstOrCreate(['name'=>$category]);
        }

        foreach(['Male', 'Female'] as $gender){
            Gender::firstOrCreate(['name'=>$gender]);
        }

        foreach(['Cash', 'Bank'] as $method){
            PaymentMethod::firstOrCreate(['name'=>$method]);
        }

        foreach(['Bring it to my house', 'I will come and collect', 'i will send some one to collect for me'] as $delivery){
            Delivery::firstOrCreate(['name'=>$delivery]);
        }

        for ($i=1; $i <= 100 ; $i++) { 
            Coupon::firstOrCreate(['code'=>substr(Hash::make($i),7),'percentage'=>$i]);
        }

    }
}
