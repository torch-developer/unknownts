<?php

namespace App\Controllers;

use \Core\View;

/**
 * Contact controller
 *
 * PHP version 7.0
 */
class Contact extends \Core\Controller
{

    /**
     * Show the Contact page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Contact/index.html');
    }
}