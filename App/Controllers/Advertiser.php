<?php

namespace App\Controllers;

use \Core\View;

/**
 * Advertiser controller
 *
 * PHP version 7.0
 */
class Advertiser extends \Core\Controller
{

    /**
     * Show the Advertiser page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Advertiser/index.html');
    }
}