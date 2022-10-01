<?php

namespace App\Controllers;

use System\Core\Controller;
use System\Core\View;

/**
 * Example home controller
 */
class Home extends Controller
{

     /**
     * Before filter
     */
    protected function before()
    {
        // TO-DO
    }


    /**
     * After filter
     */
    protected function after()
    {
        // TO-DO
    }

    /**
     * Show index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html', ['name' => 'Hadi']);
    }

}

?>