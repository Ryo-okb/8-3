<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDelFlgToFolders extends Migration
{
    public function up()
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->boolean('del_flg')->default(false);
        });
    }

    public function down()
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->dropColumn('del_flg');
        });
    }
}

