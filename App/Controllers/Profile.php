<?php

namespace App\Controllers;

use \Core\View;
use \App\Auth;
use \App\Flash;
use \App\Models\Postad;

/**
 * Profile controller
 *
 * PHP version 7.0
 */
class Profile extends Authenticated
{

    /**
     * Before filter - called before each action method
     *
     * @return void
     */
    protected function before()
    {
        parent::before();

        $this->user = Auth::getUser();
    }

    /**
     * Show the profile
     *
     * @return void
     */
    public function postadAction()
    {
        View::renderTemplate('Profile/postad.html', [
            'user' => $this->user
        ]);
    }

    /**
     * Show all category
     *
     * @return void
     */
    public function alcategoryAction()
    {
        View::renderTemplate('Profile/alcategory.html', [
            'user' => $this->user
        ]);
    }

    /**
     * Show the form for editing the profile
     *
     * @return void
     */
    public function editAction()
    {
        View::renderTemplate('Profile/edit.html', [
            'user' => $this->user
        ]);
    }

    /**
     * Update the profile
     *
     * @return void
     */
    public function updateAction()
    {
        if ($this->user->updateProfile($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/profile/show');

        } else {

            View::renderTemplate('Profile/edit.html', [
                'user' => $this->user
            ]);

        }
    }

    /**
     * Update Shop
     *
     * @return void
     */
    public function updateshopAction()
    {
        if ($this->user->updateShop($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/profile/postad');

        } else {

            View::renderTemplate('Profile/postad.html', [
                'user' => $this->user
            ]);

        }
    }

    /**
     * Update password
     *
     * @return void
     */
    public function updatepasswordAction()
    {
        if ($this->user->updatePassword($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/profile/postad');

        } else {

            View::renderTemplate('Profile/postad.html', [
                'user' => $this->user
            ]);

        }
    }

    /**
     * Update Address
     *
     * @return void
     */
    public function updateaddressAction()
    {
        if ($this->user->updateAddress($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/profile/postad');

        } else {

            View::renderTemplate('Profile/postad.html', [
                'user' => $this->user
            ]);

        }
    }

    /**
     * Update phone number
     *
     * @return void
     */
    public function updatephonenumberAction()
    {
        if ($this->user->updatePhonenumber($_POST)) {

            Flash::addMessage('Changes saved');

            $this->redirect('/profile/postad');

        } else {

            View::renderTemplate('Profile/postad.html', [
                'user' => $this->user
            ]);

        }
    }

    /**
     * Post Ads
     *
     * @return void
     */
    public function createadAction()
    {
        $postad = new Postad($_POST);

        if ($postad->save()) {

            Flash::addMessage('Successfully Post');

            $this->redirect('/profile/postad');

        } else {

            View::renderTemplate('Profile/postad.html', [
                'postad' => $postad
            ]);

        }
    }
}