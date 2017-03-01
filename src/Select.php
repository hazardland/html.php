<?php

	namespace Html;

	class Select
	{
	    /**
	    	parses select options based on $items array
	    	if $active present makes $active item from $items active option
	    	uses $key as option index
	    	uses $value as option text

	    */
		public static function options ($items, $active=null, $key='id', $value='name')
		{
			$output = '';
			if ($items)
			{
				foreach ($items as $id => $item)
				{
					if (is_array($item))
					{
						$output .= "<option value='".$item[$key]."' ".($active==$item[$key]?'selected':'').">".$item[$value]."</option>";
					}
					else
					{
						$output .= "<option value='".$id."' ".($active==$id?'selected':'').">".$item."</option>";
					}
				}
			}
			return $output;
		}
	}

?>
