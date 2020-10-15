<?PHP

// require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/dotenv-loader.php';

$auth0 = new Auth0\SDK\Auth0([
  'domain' => $_ENV['AUTH0_DOMAIN'],
  'client_id' => $_ENV['AUTH0_CLIENT_ID'],
  'client_secret'=>$_ENV['AUTH0_CLIENT_SECRET'],
  'redirect_uri' => $_ENV['AUTH0_CALLBACK_URL'],
  'audience' => $_ENV['AUTH0_AUDIENCE'],
  'scope' => 'openid profile email',
  'state_handler'=>false
]);

$GLOBALS['auth0'] = $auth0;

try {
  $userInfo = $auth0->getUser();
} catch (\Throwable $th) {
  throw $th;
}

// Include app classes
include('classes/Route.php');
include('classes/Page.php');
include('classes/Portal.php');
include('classes/Component.php');

// Define base route
Route::add('/',function(){
  Page::render('home');
});

// Register a contact route
Route::add('/contact',function(){
  Page::render('contact');
},['get', 'post']);

// Register a imprint route
Route::add('/imprint',function(){
  Page::render('imprint');
});

// Register a login route
Route::add('/login', function(){
  $auth0 = $GLOBALS['auth0'];
  
  $userInfo = $auth0->getUser();

  if(empty($userInfo)) {
    $auth0->login();
  }
});

// Register a logout route
Route::add('/logout', function(){
  $domain = $_ENV['AUTH0_DOMAIN'];
  $client_id = $_ENV['AUTH0_CLIENT_ID'];  
  $auth0 = $GLOBALS['auth0'];
  $auth_api = new \Auth0\SDK\API\Authentication( $domain, $client_id );
  $auth0->logout();
  
  $return_to = 'https://' . $_SERVER['HTTP_HOST'];
  header('Location: ' . $auth_api->get_logout_link($return_to, $client_id));
  die;

});

// Error pages
Route::pathNotFound(function($path){
	Page::render('404', 'default', ['path' => $path]);
});

Route::methodNotAllowed(function($path, $method){
  Page::render('405', 'default', ['path' => $path, 'method' => $method]);
});

// Run the router
Route::run('/');

?>
