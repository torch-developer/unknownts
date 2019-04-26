<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Postad;

/**
 * Items controller (example)
 *
 * PHP version 7.0
 */
class Allads extends \Core\Controller
{

    /**
     * Search
     *
     * @return void
     */
    public function searchAction()
    {
        $postad = new Postad;
        
        View::renderTemplate('Allads/search.html', [
            'searchs' => $postad::search($_GET['q']),
            'searchCount' => $postad::searchCount($_GET['q'])
        ]);
    }

    /**
     * Ads index
     *
     * @return void
     */
    public function indexAction()
    {  
        $postad = new Postad;
        View::renderTemplate('Allads/index.html', [
            'allads' => $postad::allads(),
            'count_mobiles' => $postad::countMobiles(),
            'count_ElectronicsAppliances' => $postad::countElectronicsAppliances(),
            'count_RealEstate' => $postad::countRealEstate(),
            'count_Furniture' => $postad::countFurniture(),
            'count_Pets' => $postad::countPets(),
            'count_BooksSportsHobbies' => $postad::countBooksSportsHobbies(),
            'count_Fashion' => $postad::countFashion(),
            'count_Kids' => $postad::countKids(),
            'count_Services' => $postad::countServices(),
            'count_Cars' => $postad::countCars(),
        ]);
    }

    /**
     * Add a new item
     *
     * @return void
     */
    public function categoryAction()
    {
        View::renderTemplate('Allads/category.html');
    }

    /**
     * Show single ads
     *
     * @return void
     */
    public function singleAction()
    {
        $postad = new Postad;
        View::renderTemplate('Allads/single.html', [
            'singleAdId' => $postad::singleAdId($_GET['id'])
        ]);
    }
}