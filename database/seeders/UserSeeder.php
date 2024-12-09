<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->name ='Nadia Chuc';
        $user1->email ='nadiachuc136@gmail.com';
        $user1->password =bcrypt('12345');
        $user1->save();
    }
}
