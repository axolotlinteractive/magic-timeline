<?php
/**
 * Created by PhpStorm.
 * User: bryce
 * Date: 5/29/15
 * Time: 4:34 PM
 */

namespace MagicTimeLine\Model;


use WordWrap\ORM\BaseModel;

class Entry extends BaseModel{

    /**
     * @var string the text for when this entry occurred
     */
    public $time_period;

    /**
     * @var string the title of this entry
     */
    public $title;

    /**
     * @var string the description of this entry
     */
    public $description;

    /**
     * @var int the time line that this entry belongs to
     */
    public $time_line_id;

    /**
     * Overwrite this in your concrete class. Returns the table name used to
     * store models of this class.
     *
     * @return string
     */
    public static function get_table(){
        return "wp_magic_time_line_entry";
    }

    /**
     * Get an array of fields to search during a search query.
     *
     * @return array
     */
    public static function get_searchable_fields() {
        // TODO: Implement get_searchable_fields() method.
    }

    /**
     * Get an array of all fields for this Model with a key and a value
     * The key should be the name of the column in the database and the value should be the structure of it
     *
     * @return array
     */
    public static function get_fields() {
        return [
            "time_period" => "VARCHAR(60)",
            "title" => "VARCHAR(120)",
            "description" => "TEXT",
            "time_line_id" => "INT(11) UNSIGNED NOT NULL"
        ];
    }
}