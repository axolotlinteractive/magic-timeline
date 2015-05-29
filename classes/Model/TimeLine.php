<?php
/**
 * Created by PhpStorm.
 * User: bryce
 * Date: 5/29/15
 * Time: 4:32 PM
 */
namespace MagicTimeLine\Model;

use \WordWrap\ORM\BaseModel;

class TimeLine extends BaseModel {

    /**
     * @var string title of this particular TimeLine
     */
    public $title;

    /**
     * @var string the image that appears at the top of this TimeLine
     */
    public $top_image;

    /**
     * @var string the alt text used in this TimeLine
     */
    public $top_image_alt;

    /**
     * @var int the primary id of the time line
     */
    public $id;

    /**
     * Overwrite this in your concrete class. Returns the table name used to
     * store models of this class.
     *
     * @return string
     */
    public static function get_table(){
        return "wp_magic_time_line";
    }

    /**
     * Get an array of fields to search during a search query.
     *
     * @return array
     */
    public static function get_searchable_fields(){
        // TODO: Implement get_searchable_fields() method.
    }

    /**
     * Get an array of all fields for this Model with a key and a value
     * The key should be the name of the column in the database and the value should be the structure of it
     *
     * @return array
     */
    public static function get_fields(){
        return [
            "title" => "VARCHAR(120)",
            "top_image" => "VARCHAR(255)",
            "top_image_alt" => "VARCHAR(255)"
        ];
    }
}