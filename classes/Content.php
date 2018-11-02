<?PHP

class Content{

	public static $contents = [];

	public static function add($name, $fields = []){

		// Add fields
		if(!array_key_exists($name,self::$contents)){
			self::$contents[$name] = $fields;
		}

		// Add update route
		Route::add('/editable/'.$name.'/([a-z0-9_-]*)',function($id) use ($name){
			$json = json_encode($_POST, JSON_PRETTY_PRINT);
			file_put_contents('content/'.$name.'-'.$id.'.json', $json);
			echo Component::render($_GET['component'], $_POST);
		},'post');

	}


	public static function render($name, $id, $component){

		// Get data
		$data = [];
		if(file_exists('content/'.$name.'-'.$id.'.json')){
			$file_contents = file_get_contents('content/'.$name.'-'.$id.'.json');
			$data = json_decode($file_contents, true);
		}

		Portal::in('modals', Component::render('content_modal', [
			'name'=>$name,
			'id'=>$id,
			'component'=>$component,
			'fields'=>self::$contents[$name],
			'data'=>$data
		]));

		?>

		<a id="edit-<?=$name ?>-<?=$id ?>" class="button" onClick="addClass('modal-<?=$name ?>-<?=$id ?>','is-active')">Edit <?=$id ?> <?=$name ?></a>

		<div id="content-<?=$name.'-'.$id ?>">
			<?=Component::render($component, $data) ?>
		</div>

		<?PHP

	}
}
