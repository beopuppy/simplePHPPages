# SimplePHPPages
This project provides simple and basic concepts for PHP pages with no dependencies. It includes ideas and samples for routing, pages, layouts, components and portals.

## Test setup with Docker
I have created a little Docker test setup.

1. Build the image: ```docker build -t simplephppages docker/image```

2. Spin up a container
	* On Linux / Mac or Windows Powershell use: ```docker run -d -p 80:80 -v $(pwd):/var/www/html --name simplephppages simplephprouter```
	* On Windows CMD use ```docker run -d -p 80:80 -v %cd%:/var/www/html --name simplephppages simplephppages```

3. Open your browser and navigate to http://localhost

## Basic concepts

### Routing
To learn more about the router check out https://github.com/steampixel/simplePHPRouter/blob/master/index.php
Look at the example pages in the index.php file. You can create new routes in there.

### Pages
A page is basically a PHP file. Every PHP file located in the `/pages` folder will become a page. You can simply render a page by calling `Page::render('home');` for example.
It makes sense to only render a page if a route was matched:

```
Route::add('/',function(){
  Page::render('home');
});
```
Take a look at the `index.php` file for more examples.

### Themes
The theme is located in the `themes/` folder. Currently there is no way to switch the theme. So there is only a theme called `default`.

### Components
A component is just a reusable snippet of PHP code that will render different parts of a page or a layout. For example the navbar and the footer are just components used by a layout. Use the `Component::render` method to print out the results:
 ```
<?=Component::render('navigation') ?>
 ```
Or if you want use them with arguments:
 ```
<?=Component::render('footer', ['text' => 'Copyright 2019']) ?>
 ```
Components are useful for pages. They will give them some structure and will keep them clean:
```
<?=Component::render('hero', [
    'title'=> 'simplePHPPages',
    'subtitle'=> 'Basic concepts for low level PHP page building'
]) ?>

<?=Component::render('text', [
    'title'=> 'Lorem ipsum',
    'text'=> 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'
]) ?>

```

### Portals
Portals provide a very powerful way of sending contents inside your themes and pages to different locations. Imagine the following situation: A snippet of PHP-Code (for example a gallery slider) will output some HTML to your Page. But it needs some JavaScript. You don't want to render this together with your slider. You want to render the Javascript into the footer of your HTML document. This is where portals come into play: Just define a portal receive point somewhere in your theme:
```
<?=Portal::receive('js') ?>
```
Then, from a page or a component, for example, you can send contents to this point:
```
<?PHP Portal::send('js', '<script src="/themes/default/assets/js/slider.js"></script>') ?>
```
Portals are also used to set the page title in the HTML layout from within the page file:
Inside the page:
```
<?PHP Portal::send('title', 'Homepage') ?>
```
Inside the layout:
```
<title>Default Page - <?=Portal::receive('title') ?></title>
```
