<?php

namespace App\Controllers\Admin;

use System\Core\Controller;

/**
 * Example users controller
 */
class Users extends Controller
{

     /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        echo "(Before )";
    }


    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo 'Hello Admin';
    }

}

?>