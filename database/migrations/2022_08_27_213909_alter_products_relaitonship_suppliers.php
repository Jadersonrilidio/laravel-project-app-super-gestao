<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterProductsRelaitonshipSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('products', function (Blueprint $table) {
            
            $supplier_id = DB::table('suppliers')->insertGetId([
                'name'  => 'Default Supplier',
                'uf'    => 'MG',
                'email' => 'defaultsupplier@default.com',
            ]);

            $table->unsignedBigInteger('supplier_id')->default($supplier_id)->after('unit_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // $table->dropConstrainedForeignId('supplier_id');
            $table->dropForeign('products_supplier_id_foreign');
            $table->dropColumn('supplier_id');
        });
    }
}
