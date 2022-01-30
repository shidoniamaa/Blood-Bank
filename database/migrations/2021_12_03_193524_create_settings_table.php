<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_settings_text');
			$table->text('about_app');
			$table->bigInteger('phone');
			$table->string('email');
			$table->string('fb_link');
			$table->string('insta_link');
			$table->string('whatsup_link');
			$table->string('tw_link');
			$table->string('google_link');
			$table->string('youtube');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}