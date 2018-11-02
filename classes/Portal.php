<?PHP

class Portal{
	
	private static $contents = [];
	
	public static function in($portalName, $content){
		if(!array_key_exists($portalName,self::$contents)){
			self::$contents[$portalName] = [];
		}
		array_push(self::$contents[$portalName],$content);
	}
	
	public static function out($portalName){
		$outString = '';
			if(array_key_exists($portalName,self::$contents)){
				foreach(self::$contents[$portalName] as $content){
				$outString .= $content;
			}
		}
		return $outString;
	}
	
	public static function inStart() {
		ob_start();
	}
	
	public static function inEnd($portalName) {
		self::in($portalName,ob_get_clean());
	}
	
}