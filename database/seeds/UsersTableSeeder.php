<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //reset users table
        // DB::table('users')->truncate();
        //generate 3 users
        $user = new User();
        $user->truncate();
        $user->insert([
            [
                'name' => 'Kinje Mundi',
                'email' => 'kinjena@mundi.com',
                'password' => bcrypt('101032'),
            ],
            [
                'name' => 'Mozy Mozina',
                'email' => 'moze@mundi.com',
                'password' => bcrypt('101032'),
            ],
            [
                'name' => 'Baraka Mwakilima',
                'email' => 'bam@mundi.com',
                'password' => bcrypt('101032'),
            ],
        ]);
    }
}
