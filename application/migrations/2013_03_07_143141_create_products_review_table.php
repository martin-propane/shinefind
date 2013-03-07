<?php

class Create_Products_Review_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::query('CREATE TABLE `Data_Reviews_Products` ( '.
			'`id` int(10) unsigned NOT NULL AUTO_INCREMENT, '.
			'`p_id` int(11) unsigned NOT NULL, '.
			'`review` text COLLATE utf8_unicode_ci, '.
			'`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, '.
			'`rating` decimal(10,2) NOT NULL, '.
			'`title` text COLLATE utf8_unicode_ci, '.
			'PRIMARY KEY (`id`) '.
			') ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Data_Reviews_Products');
	}

}
