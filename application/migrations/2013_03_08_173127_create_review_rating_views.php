<?php

class Create_Review_Rating_Views {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//NOTE: Laravel doesn't seem to execute these correctly
		//They might need to be manually added to the database
		DB::raw('CREATE VIEW View_Carwash_Ratings AS '.
			'SELECT cw_id, AVG(rating) rating '.
			'FROM Data_Reviews_Carwashes '.
			'GROUP BY cw_id;');

		DB::raw('CREATE VIEW View_Product_Ratings AS '.
			'SELECT p_id, AVG(rating) rating '.
			'FROM Data_Reviews_Products '.
			'GROUP BY p_id;');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::raw('DROP VIEW View_Carwash_Ratings;');
		DB::raw('DROP VIEW View_Product_Ratings;');
	}

}
