<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Method 01 - Model static method 'create'
        Supplier::create(array(
            'name'  => 'supplier 01',
            'uf'    => 'RO',
            'email' => 'supplier01@gmail.com'
        ));

        // Method 02 - Instantiate a new object and add the atributes to finally save
        $supplier = new Supplier;
        $supplier->name = 'supplier 02';
        $supplier->uf = 'MG';
        $supplier->email = 'supplier02@gmail.com';
        $supplier->save();

        // Method 03 - Use the DB class static methods 'table' and 'insert' to insert registers on a specified db table
        DB::table('suppliers')->insert(array(
            'name'       => 'supplier 03',
            'uf'         => 'RN',
            'email'      => 'supplier03@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
    }
}
