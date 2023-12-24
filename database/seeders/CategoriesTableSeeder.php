<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            'name' => 'asuransi',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'belanja',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'elektronik',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'kantor',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'kesehatan',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'Lain-lain',
            'type' => 'expense',
        ]);

        Categorie::create([
            'name' => 'makanan',
            'type' => 'expense',
        ]);

        //income

        Categorie::create([
            'name' => 'deposito',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'dividen',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'hibah',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'investasi',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'kupon',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'lain-lain',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'pengembalian dana',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'penghargaan',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'penjualan',
            'type' => 'income',
        ]);

        Categorie::create([
            'name' => 'penyewaan',
            'type' => 'income',
        ]);
    }
}
