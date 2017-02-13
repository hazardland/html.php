<?php
	
	namespace html;

	class document
	{
		public static function script ($src)
		{
			return "<script src=\"".$src."\"></script>";
		}
		public static function style ($href)
		{
			return "<link rel=\"stylesheet\" href=\"".$href."\" />";
		}
		/**
			document::redirect() -> redirect to current script location
			document::redirect('http://custom/location/') -> redirect to http://custom/location/
		*/
	    public static function redirect ($location=null)
	    {
	    	header ('Location: '.($location===null?self::location():''));
	        ob_end_flush();
	        exit;
	    }
	    /**
			document::location() -> http://path/to/current.php
			document::location(['param1'=>'value1','param2'=>'value2']) -> http://path/to/current.php?param1=value1&param2=value2
			document::location('custom.php') -> http://path/to/custom.php
			document::location('custom.php',['param1'=>'value1','param2'=>'value2']) -> http://path/to/custom.php?param1=value1&param2=value2
	    */
	    public static function location ($resource=null, $parameters=null)
	    {
	    	if (is_array($resource))
	    	{
	    		$parameters = $resource;
	    		$resource = null;
	    	}
	    	return self::protocol().$_SERVER['SERVER_ADDR'].($resource===null?$_SERVER['SCRIPT_NAME']:$resource).(count($parameters)?'?'.http_build_query($parameters):'');
	    }
	    /**
	    	returns current protocol -> http:// or https://
	    */
	    public static function protocol ()	
	    {
			return stripos($_SERVER['SERVER_PROTOCOL'],'https')===true?'https://':'http://';
	    }
	}

?>