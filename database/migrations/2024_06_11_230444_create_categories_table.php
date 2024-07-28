<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('user_id');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            'name' => 'Sem categoria',
            'slug' => 'sem-categoria',
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::table('categories')->where('slug', 'sem-categoria')->delete();

        Schema::dropIfExists('categories');

    }
}
