<?php

class Create_Senior_And_Military_Discount_Plus_Fundraising_Tables {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::query(
			'CREATE TABLE `Other_SeniorDiscount` ( ' .
			'`cw_id` int(11) unsigned NOT NULL, ' .
			'PRIMARY KEY (`cw_id`) ' .
			') ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ');

		DB::query(
			'CREATE TABLE `Other_MilitaryDiscount` ( ' .
			'`cw_id` int(11) unsigned NOT NULL, ' .
			'PRIMARY KEY (`cw_id`) ' .
			') ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ');

		DB::query(
			'CREATE TABLE `Other_Fundraiser` ( ' .
			'`cw_id` int(11) unsigned NOT NULL, ' .
			'PRIMARY KEY (`cw_id`) ' .
			') ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Other_SeniorDiscount');
		Schema::drop('Other_MilitaryDiscount');
		Schema::drop('Other_Fundraiser');
	}

}
