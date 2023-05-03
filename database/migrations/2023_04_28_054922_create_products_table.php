<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('category_id');
        $table->boolean('is_active');
        $table->timestamps();
    });

    $faker = Faker\Factory::create();
    for ($i = 0; $i < 20; $i++) {
        DB::table('products')->insert([
            'name' => $faker->name,
            'category_id' => $faker->numberBetween(1, 5),
            'is_active' => $faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

};

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('products', function (Blueprint $table) {
//             $table->id();
//             //if nullable needs than implement it.
//             $table->foreignId('category_id')/*->nullable()*/->constrained("categories");
//             $table->string("name",100);
//             $table->boolean('is_active');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('products');
//     }
// };

