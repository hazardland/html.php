<?php
	class input
	{
		public static function create ($type, $name, $id, $class=null, $value=null, $parameters=[])
		{

		}
	}

	class div
	{
		public static function create ($class, $id, $parameters=[], $content=null)
		{

		}
	}

	class form
	{
		public static function create ($name, $id, $class, $method, $action=null)
		{

		}
	}

	form::create('player','window','get',document::location(),[],
		div::create('title',
			'Player'
		),
		div::create('content',
			input::create('edit','player_login',getPlayerLogin()),
			input::create('edit','player_login',getPlayerLogin()),
			input::create('submit','Set Player')
		)
	);

?>