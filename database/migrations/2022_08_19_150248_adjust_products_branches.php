<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustProductsBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->timestamps();
        });

        Schema::create('products_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('sale_price', 8, 2)->default(0.00);
            $table->integer('minimun_inventory')->default(0);
            $table->integer('maximun_inventory')->default(0);
            $table->timestamps();            
            
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('branch_id')->references('id')->on('branches');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sale_price', 'minimun_inventory', 'maximun_inventory']);
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
            $table->integer('maximun_inventory')->default(0)->after('weight');
            $table->integer('minimun_inventory')->default(0)->after('weight');
            $table->decimal('sale_price', 8, 2)->default(0.00)->after('weight');
        });

        Schema::table('products_branches', function (Blueprint $table) {
            $table->dropForeign('products_branches_product_id_foreign');
            $table->dropForeign('products_branches_branch_id_foreign');
            $table->dropColumn('product_id');
            $table->dropColumn('branch_id');
        });

        Schema::dropIfExists('products_branches');
        Schema::dropIfExists('branches');
    }
}
