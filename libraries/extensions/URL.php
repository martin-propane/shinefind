<?php namespace Extensions;
class URL extends \Laravel\URL
{
	public static function to_action_query($action, $values=array(), $query=array())
	{
		$query_url = self::to_action($action, $values);
		if (count($query) > 0)
			$query_url = $query_url . '?' . http_build_query($query);

		return $query_url;
	}

	public static function current_query($query)
	{
		$query_url = self::current();
		if (count($query) > 0)
			$query_url = $query_url . '?' . http_build_query($query);

		return $query_url;
	}
}

?>
