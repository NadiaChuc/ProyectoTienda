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
        $user1->name ='Noe Tun';
        $user1->email ='noe.tun03@gmail.com';
        $user1->password =bcrypt('123456789');
        $user1->id_permiso=1;
        $user1->save();
    }
}
