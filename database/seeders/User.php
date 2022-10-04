<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new ModelsUser();
        $user1->name = "Steveen Dominguez";
        $user1->email = "steveena.dominguezb@gmail.com";
        $user1->password = Hash::make("789654");
        $user1->admin = true;
        $user1->save();
    }
}
