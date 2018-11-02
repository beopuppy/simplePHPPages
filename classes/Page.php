<?PHP

class Page{

	public static function add($expression, $name, $layout='default', $arguments = []){

		//foreach($arguments as $argument){

		//}

		Route::add($expression, function() use ($name, $layout) {

			// Catch the page results and send them to the main portal
			Portal::inStart();
			include('pages/'.$name.'.php');
			Portal::inEnd('main');

			// Include the layout
			include('themes/default/layouts/'.$layout.'.php');

		});



	}

}
