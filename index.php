<?PHP

// Include app classes
include('classes/Route.php');
include('classes/Page.php');
include('classes/Portal.php');
include('classes/Component.php');
include('classes/Content.php');

// Add base route (startpage)
Page::add('/','home');

// Simple test page that simulates static html file
Page::add('/test.html','test');

// Simple contact form page
Page::add('/contact','contact');

Content::add('titles',[
	['name'=>'title', 'type'=>'text', 'placeholder'=>'Titel eingeben'],
	['name'=>'subtitle', 'type'=>'text', 'placeholder'=>'Untertitel eingeben']
]);

Content::add('text',[
	['name'=>'title', 'type'=>'text', 'placeholder'=>'Titel eingeben'],
	['name'=>'text', 'type'=>'textarea', 'placeholder'=>'Text eingeben']
]);

Content::add('footer',[
	['name'=>'text', 'type'=>'textarea', 'placeholder'=>'Text eingeben']
]);

// Post route example
Route::add('/contact',function(){
  echo 'Hey! The form has been sent:<br/>';
  print_r($_POST);
},'post');

// Route with regexp parameter
// Be aware that (.*) will match / (slash) too. For example: /user/foo/bar/edit
// Also users could inject mysql-code or other untrusted data if you use (.*)
// You should better use a saver expression like /user/([0-9]*)/edit or /user/([A-Za-z]*)/edit
Route::add('/user/(.*)/edit',function($id){
  echo 'Edit user with id '.$id.'<br/>';
});

// Add a 404 not found route
Route::pathNotFound(function($path){
  echo 'Error 404 :-(<br/>';
  echo 'The requested path "'.$path.'" was not found!';
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method){
  echo 'Error 405 :-(<br/>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Run the Router with the given Basepath
// If your script lives in the web root folder use a / or leave it empty
Route::run('/');

// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// Route::run('/api/v1');

?>
