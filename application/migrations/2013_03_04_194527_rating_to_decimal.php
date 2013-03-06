<?php

class Rating_To_Decimal {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->drop_column('rating');
		});

		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->decimal('rating', 10, 2);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->drop_column('rating');
		});

		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->integer('rating', 10);
		});
	}

}
