<?php

/**
 * @author Rathes Sachchithananthan <sachchi@rathes.de>
 * @version 1.0.0
 */

namespace App\Http\Controllers;

use fokuscms\Components\Foundation\Application;
use fokuscms\Components\Routing\Controller;

class HomeController extends Controller {

    /**
     * this is the function called by the route
     * in the routes.php
     */
    public function index(){

        return $this->render('index:index.php', [
            'name' => 'Luke',
        ]);

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function englishIndex(){

        Application::setLanguage('en-US');
        return $this->render('index:index.php', [
            'name' => 'Luke',
        ]);

    }

}