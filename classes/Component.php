<?PHP

class Component {

	public static function render ($vb56df34_name, $arguments = []) {
		ob_start();
		extract($arguments);
		// The name variable was prefixed because extract could override it
		include('themes/default/components/'.$vb56df34_name.'.php');
		return ob_get_clean();
	}

}
