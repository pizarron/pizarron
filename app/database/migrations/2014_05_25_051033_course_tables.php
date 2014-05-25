<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('organizations', function($t) {
			$t->increments('id');
			$t->string('name');
			$t->string('email');
			$t->string('website');
			$t->string('description');
			$t->string('picture_url');
			$t->timestamps();
		});
		Schema::create('courses', function($t) {
			$t->increments('id');
			$t->string('title');
			$t->text('description');
			$t->text('about_course');
			$t->text('syllabus');
			$t->text('lectures');
			$t->string('language');
			$t->string('picture_url');
			$t->string('video_url');
			$t->boolean('is_public');
			$t->integer('user_id')->unsigned(); // it is supposed to be the owener
			$t->integer('organization_id')->unsigned()->nullable();
			$t->timestamps();
		});
		Schema::create('organization_admin', function($t) {
			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->integer('organization_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organization_admin');
		Schema::drop('courses');
		Schema::drop('organizations');
	}

}
