<?php

namespace App\Controllers;

use System\Core\Controller;
use System\Core\View;
use App\Models\Post;

/**
 * Example posts controller
 */
class Posts extends Controller
{

    /**
     * Get all posts from DB and show them in index page
     */
    public function indexAction()
    {
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html', ['posts' => $posts]);
    }


    /**
     * Add new post
     */
    public function addNewAction()
    {
       // To-Do
    }

    /**
     * Edit post
     */
    public function editAction()
    {
       // To-Do
    }


}

?>