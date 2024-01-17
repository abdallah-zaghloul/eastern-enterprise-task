<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(): void
    {
        //logo, name, description and address.
		Schema::create('companies', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->longText('address')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(): void
    {
		Schema::drop('companies');
	}
};
