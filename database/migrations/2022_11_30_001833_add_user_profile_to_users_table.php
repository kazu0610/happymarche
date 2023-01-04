<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->Integer('tel')->nullable()->comment('電話番号');
            $table->integer('postcode')->nullable()->comment('郵便番号');
            $table->text('address')->nullable()->comment('住所');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tel');
            $table->dropColumn('postcode');
            $table->dropColumn('address');
        });
    }
};
