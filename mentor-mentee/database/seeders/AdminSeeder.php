<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        Admin::create([
            'adminName' => 'Rakesh Gupta',
            'empId' => 'RKG125687',
            'email' => 'rakesh@srisaigroup.in',
            'phone' => '7006825471',
            'address' => 'Punjab, Pkt 125478',
            'password' => Hash::make('rakeshgupta'),
        ]);
    }
}
