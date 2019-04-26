<?php

namespace App\Models;

use PDO;
use \Core\View;

/**
 * Add ad_image model
 *
 * PHP version 7.0
 */
class Postad extends \Core\Model
{
    /**
     * Error messages
     *
     * @var array
     */
    public $errors = [];

    /**
     * Posted Ad
     *
     * @var array
     */
    public $postedad = [];

    /**
     * Class constructor
     *
     * @param array $data  Initial property values (optional)
     *
     * @return void
     */
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        };
    }

    /**
     * Save the ad_image model with the current property values
     *
     * @return boolean  True if the ad_image was saved, false otherwise
     */
    public function save()
    {
        $this->validate();

        if (empty($this->errors)) {

            $name = $_FILES['ad_image']['name'];
            $temp_name = $_FILES['ad_image']['tmp_name'];
            $type = $_FILES['ad_image']['type'];
            $size = $_FILES['ad_image']['size'];
            $error = $_FILES['ad_image']['error'];
            $type = $_FILES['ad_image']['type'];

            $newname = uniqid('', true) . '.' . $name;
            $dst = "./uploads/". $newname;

            move_uploaded_file($_FILES["ad_image"]["tmp_name"], $dst);

            $sql = 'INSERT INTO postads (ad_category, ad_title, ad_caption, ad_price, ad_condition, ad_description, ad_image)
                    VALUES (:ad_category, :ad_title, :ad_caption, :ad_price, :ad_condition, :ad_description, :ad_image)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':ad_category', $this->ad_category, PDO::PARAM_STR);
            $stmt->bindValue(':ad_title', $this->ad_title, PDO::PARAM_STR);
            $stmt->bindValue(':ad_caption', $this->ad_caption, PDO::PARAM_STR);
            $stmt->bindValue(':ad_price', $this->ad_price, PDO::PARAM_INT);
            $stmt->bindValue(':ad_condition', $this->ad_condition, PDO::PARAM_STR);
            $stmt->bindValue(':ad_description', $this->ad_description, PDO::PARAM_STR);
            $stmt->bindValue(':ad_image', $dst, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }

    /**
     * Validate current property values, adding valiation error messages to the errors array property
     *
     * @return void
     */
    public function validate()
    {

        // Author
        if ($this->ad_category == '') {
            $this->errors[] = 'Author is required';
        }

        // Title
        if ($this->ad_title == '') {
            $this->errors[] = 'Title is required';
        }

        // Category
        if ($this->ad_caption == '') {
            $this->errors[] = 'Caption is required';
        }

        // Category
        if ($this->ad_price == '') {
            $this->errors[] = 'Price is required';
        }

        // Category
        if ($this->ad_condition == '') {
            $this->errors[] = 'Conditon is required';
        }

        // description
        if ($this->ad_description == '') {
            $this->errors[] = 'description is required';
        }
    }

    /**
     * select all ads
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function AllAds()
    {
        $sql = 'SELECT * FROM postads ORDER BY id DESC LIMIT 10';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetchALL();
        

    }

    /**
     * count mobiles
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countMobiles()
    {
        $ad_category = "mobiles";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Electronics & Appliances
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countElectronicsAppliances()
    {
        $ad_category = "Electronics and Appliances";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Electronics & Appliances
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countRealEstate()
    {
        $ad_category = "Real, Estate";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Cars
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countFurniture()
    {
        $ad_category = "Furniture";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Pets
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countPets()
    {
        $ad_category = "Pets";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Books, Sports & Hobbies
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countBooksSportsHobbies()
    {
        $ad_category = "Books, Sports & Hobbies";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Fashion
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countFashion()
    {
        $ad_category = "Fashion";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Kids
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countKids()
    {
        $ad_category = "Kids";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Services
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countServices()
    {
        $ad_category = "Services";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * count Cars
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function countCars()
    {
        $ad_category = "Cars";

        $sql = 'SELECT * FROM postads WHERE ad_category = :ad_category';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ad_category', $ad_category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * select search ads
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function search($q)
    {
        $sql = 'SELECT * FROM postads WHERE ad_title LIKE :q OR ad_description LIKE :q';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->bindValue(':q', '%'.$q.'%', PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchALL();
        

    }

    /**
     * select searchCount ads
     *
     * @param string 
     *
     * @return mixed 
     **/
    public static function searchCount($q)
    {
        $sql = 'SELECT * FROM postads WHERE ad_title LIKE :q OR ad_description LIKE :q';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':q', '%'.$q.'%', PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
        

    }

    /**
     * sort by low price ads
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function sortLowToHigh($q)
    {
        $sql = 'SELECT * FROM postads ORDER BY ad_price DESC ';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetchALL();
        

    }

    /**
     * sort by high price ads
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function sortHighToLow($q)
    {
        $sql = 'SELECT * FROM postads ORDER BY ad_price ASC ';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetchALL();
        

    }

    /**
     * count mobiles
     *
     * @param string 
     *
     * @return mixed 
     */
    public static function singleAdId($single_id)
    {

        $sql = 'SELECT * FROM postads WHERE id = :id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $single_id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

}