<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

       $faker = Faker::create();

           foreach (range(1,6) as $index) {

            DB::table('menus')->insert([

                'name' => $faker->name,

                'parent_id' => 0

            ]);

        }

        foreach (range(1,50) as $index) {

            DB::table('menus')->insert([

                'name' => $faker->name,

                'parent_id' => $faker->numberBetween(1,20)

            ]);

        }

        DB::table('users')->insert([

                'name' => 'admin',

                'lname' => 'admin',

                'email' => 'test@hotmail.com',

                'password' => '$2y$10$AYGJxYwuu0WoJpgIr6aJ2OsY9lqyqHuokYOfh51AoKwzbcg6c2BXu',

                'is_admin' => '1',
            
                'created_at' => '2020-01-25 07:33:06',

            ]);

        DB::table('settings')->insert([

                'email' => '[{"email":"promos33@hotmail.com","host":"smtp.gmail.com","user":"numwhan154@gmail.com","password":"","port":"465","secure":"ssl"}]',

                'social' => '[{"fb":"www.facebook.com","ig":"www.instragram.com","gg":"www.google.com","yt":"www.youtube.com","twt":"www.twister.com","line":"www.line.com"}]',

                'seo' => '[{"fb_id":"","title":"","keyword":""}]',

                'address_th' => '[{"company_th":"Company_YH","address_th":"Address_TH","tel_th":"Tel_TH","fax_th":"Fqax_Th","phone_th":"Phone_th","ifram_th":"iFram_TH"}]',

                'address_en' => '[{"company_en":"COmpany EN","address_en":"Address EN","tel_en":"Tel EN","fax_en":"Fax EN","phone_en":"`Phone EN","ifram_en":"iFram EN"}]',

                'payment' => '[{"pompay":"","opk":"","osk":"","merchant_id":"","secret_key":"","payment_url":""}]',

            ]);

        for($i = 0; $i < 2; $i++){
            DB::table('db_other')->insert([

                'name' => 'slide',
                'status' => '1',

            ]);

        }



    }

}
