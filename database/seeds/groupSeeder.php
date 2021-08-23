<?php

use Illuminate\Database\Seeder;

class groupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=[
            'owner', 'admin','supervisor','driver','student'
        ];

        foreach ($names as $name) {
            DB::table('user_group')->insert(
                [
                    'name'=> $name
                ]

            );
        }

        //factory(App\User::class, 100)->create();


    }
}
