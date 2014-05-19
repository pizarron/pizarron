<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function($t) {
			$t->increments('id');
			$t->string('name');
			$t->string('email');
			$t->string('password');
			$t->string('country');
			$t->string('bio');
			$t->string('website');
			$t->string('picture_url');
			$t->string('role');
			$t->string('remember_token'); // new feature for laravel 4.1.26
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}
}
