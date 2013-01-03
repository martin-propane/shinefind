<?php

use Laravel\Database;

class ClearDatabase_Task
{
	public $databases = array('Data_Associations', 'Data_Carwashes', 'Other_ConvenienceStore', 'Other_CreditCards', 'Other_Fuel', 'Other_GiftCards', 'Other_OilChange', 'Other_Other', 'Other_PetWash', 'Other_Salon', 'Reviews_Carwashes', 'Type_Detailing', 'Type_FreeVacuums', 'Type_FullService', 'Type_HandWash', 'Type_Mobile', 'Type_SelfServe', 'Type_SoftTouch', 'Type_TouchFree', 'Type_Tunnel', 'Type_Xpress');
	public function run()
	{
		foreach ($this->databases as $db)
			Database::table($db)->delete();
	}
}
