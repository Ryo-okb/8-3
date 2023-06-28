<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            
            $table->string('title');
            $table->date('deadline');
            $table->enum('status', ['未着手', '着手中', '完了'])->default('未着手');
            $table->foreignId('folder_id')->constrained('folders');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
