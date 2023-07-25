<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void{

        // Category::create([
        //     'user_id' => 1,
        //     'name'    => 'Fruits',
        // ]);
        // Category::create([
        //     'user_id' => 1,
        //     'name'    => 'Vegetables',
        // ]);
        // Product::create([
        //     'user_id'     => 1,
        //     'category_id' => 1,
        //     'name'        => 'Delicious Apple',
        //     'price'       => '$1.25',
        //     'unit'        => '1 piece',
        //     'img_url'     => 'https: //example.com/images/apple.jpg',
        // ]);
        // Product::create([
        //     'user_id'     => 1,
        //     'category_id' => 1,
        //     'name'        => 'Juicy Orange',
        //     'price'       => '$0.99',
        //     'unit'        => '1 piece',
        //     'img_url'     => 'https://example.com/images/orange.jpg',
        // ]);

        Customer::create([
            'name'    => 'John Doe',
            'email'   => 'john.doe@example.com',
            'mobile'  => '+1234567890',
            'user_id' => 1,
        ]);

        Customer::create([
            'name'    => 'Jane Smith',
            'email'   => 'jane.smith@example.com',
            'mobile'  => '+9876543210',
            'user_id' => 1,
        ]);

        Customer::create([
            'name'    => 'Michael Johnson',
            'email'   => 'michael.johnson@example.com',
            'mobile'  => '+1111111111',
            'user_id' => 1, // Assuming this customer is associated with the user with ID 2
        ]);

        Customer::create([
            'name'    => 'Emily Davis',
            'email'   => 'emily.davis@example.com',
            'mobile'  => '+2222222222',
            'user_id' => 7, // Assuming this customer is associated with the user with ID 2
        ]);

        Customer::create([
            'name'    => 'Robert Wilson',
            'email'   => 'robert.wilson@example.com',
            'mobile'  => '+3333333333',
            'user_id' => 1, // Assuming this customer is associated with the user with ID 1
        ]);

        Customer::create([
            'name'    => 'Sophia Brown',
            'email'   => 'sophia.brown@example.com',
            'mobile'  => '+4444444444',
            'user_id' => 7, // Assuming this customer is associated with the user with ID 3
        ]);

        Customer::create([
            'name'    => 'William Miller',
            'email'   => 'william.miller@example.com',
            'mobile'  => '+5555555555',
            'user_id' => 7, // Assuming this customer is associated with the user with ID 3
        ]);

        Customer::create([
            'name'    => 'Olivia Taylor',
            'email'   => 'olivia.taylor@example.com',
            'mobile'  => '+6666666666',
            'user_id' => 7, // Assuming this customer is associated with the user with ID 2
        ]);

        Customer::create([
            'name'    => 'David Anderson',
            'email'   => 'david.anderson@example.com',
            'mobile'  => '+7777777777',
            'user_id' => 1, // Assuming this customer is associated with the user with ID 1
        ]);

        Customer::create([
            'name'    => 'Emma Hernandez',
            'email'   => 'emma.hernandez@example.com',
            'mobile'  => '+8888888888',
            'user_id' => 7, // Assuming this customer is associated with the user with ID 3
        ]);
    }
}
