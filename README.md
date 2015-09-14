# Quickstart
## What`s this guide about?
This little guide is for getting started with the FKS. It will give you a simple step-by-step introduction in how to create a small application with the framework. You will understand the basic concepts after working through this guide. Further details are explained in the full documentation.
## What is Blackhound?
Blackhound is a simple PHP-based framework which was created as the foundation of the **fokus² CMS**. It was made using conventions and components that are common in web development to ensure that you are able to refine this framework with us as well.

Blackhound is made using components of many other famous PHP projects as the [Symfony2](http://symfony.com/) components and using [Illuminate](https://github.com/illuminate) components (Laravel). But the framework is kept simpler than the other frameworks and was created to support developer in creating applications as fast as possible and with less boundaries.
##Installing Blackhound
The setup of this framework is very simple and has following requirements:

- A web server (something like the Apache module mod_rewrite is recommended)
- at least PHP 5.5
- A database that is supported by Illuminate (e.g. MySQL)

At first install Composer using the [instructions of the official page](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx). We recommend to install Composer globally as you will definitely need it for other PHP-based projects as well.

Now move in your command line tool to the directory where your project should be installed and call the following command which will clone Blackhound and it's dependecies to this folder.

	composer create-project fokuscms/blackhound <your-project-name> --prefer-dist

Replace `<your-project-name>` with the name of your project. The  new directory that was created by composer will be your project root.

## Testing your installation
Just visit the directory you created and you will see the following Welcome screen:

> **Notes for experienced developers:** You may comment that it is not the very best way to have the `index.php` as the entry point for the application but use a public folder where the virtual host points to. You are definitely right with this. But we still decided for this way. That`s because Blackhound is mainly made to be the framework behind fokus² CMS and this CMS is used by many users on the free hosting services that do not support changing the document root. For the future we are going to serve an alternative way, but for now this must be okay.

## Hello World
So far we have successfully installed Blackhound and now it's time to create our first application.

### Routes
When you open up your project in your IDE you will see the following projects structure:

    <your-project-name>
        -- content/
            -- lang/
                -- de-DE/
        -- system/
            -- app/
                -- Http/
                    -- Controllers/
                -- views/
            -- config/
        -- vendor/
        index.php
        composer.json
        composer.lock
There are more files and some more directories than listed here but this shows the basic structure of the project.
The entry point is `index.php`. Every request that is sent will be processed by this file. At first it looks up the requested route with the ones you have registered.

You can register your routes in `system/app/Http/routes.php`. You will find a sample route in this file that matches to the welcome screen:

    $router->get('/', 'HomeController::index', array('name' => 'home'));
This route matches to the entry-point of your project `/` and starts the `index()` action of the `HomeController` which you can find in `/system/app/Http/Controllers/`.

Let's create our own route for our "Hello world"-page:

    $router->get('/hello-world', 'HomeController::hello', array('name' => 'hello'));
Now we have created a route to `/hello-world` that should call `hello()` of the `HomeController`

### Controller
So now let's switch to the Controller. You will already find `index()`. And you will see that it does nothing more than returning the results of `$this->render();`.

This function gets the view file in the first parameter and an array of data in the second parameter. As a result it will create a Response using the defined view file and replacing all its variables with the one defined in the array.

So let's create our action. In our definition of the route we called the function "hello", so we have to name it here as `hello()` as well. And we are going to render a view called "hello".

In the sample function you see `"index:index.php"` as the parameter for the view-file. The colon is simply the seperator between the folders. So in this case you can say that you can find the view-file in the directory `index/` and it is named as `index.php`. Starting point for views is always `/system/app/views`. If you now look this file up, you will find the view-file.

### Views

So in our controller we have now created the following function:

    public function hello(){
        return $this->render("hello.php", []);
    }

So now it`s time to create the view-file. Following the explanation above the view-file should be created in `/system/app/views/hello.php`. And now it's easy. Just create a simple HTML-File as you know, for example the following one:

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Blackhound!</title>
    
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    
    </head>
    <body>
        <h1>Hello world </h1>
    </body>
    </html>
    
If you now open this route in your browser exactly this screen will be displayed. Easy, huh? That was a quickstart. Of course you can do a little more with Blackhound (although we are at the beginning and do not have implemented that much so far). Check out detailed component pages to find out more.