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
     * Overwrite this in your concrete class. Returns the table name used to
     * store models of this class.
     *
     * @return string
     */
    public static function get_table(){
        return "magic_time_line_entry";
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
        // TODO: Implement get_fields() method.
    }
}