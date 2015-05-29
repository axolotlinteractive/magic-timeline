<?php
/**
 * Created by PhpStorm.
 * User: bryce
 * Date: 5/24/15
 * Time: 8:15 PM
 */

namespace MagicTimeLine;


use WordWrap\ShortCodeScriptLoader;
use WordWrap\View\View;
use WordWrap\View\ViewCollection;

class TimeLineShortCode extends ShortCodeScriptLoader{

    /**
     * @param  $atts array inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
        $str = file_get_contents(__DIR__ . "/../data.json");
        $json = json_decode($str);

        $collection = new ViewCollection($this->lifeCycle, "front_end_container");

        $collection->setTemplateVar("timeline_title", $json->timeline_title);
        $collection->setTemplateVar("top_image", $json->top_image);
        $collection->setTemplateVar("top_image_alt", $json->top_image_alt);
        $collection->setTemplateVar("bottom_image", $json->bottom_image);
        $collection->setTemplateVar("bottom_image_alt", $json->bottom_image_alt);

        foreach($json->timeline_entry as $entry) {
            $entryView = new View($this->lifeCycle, "front_end_entry");

            $entryView->setTemplateVar("time_period", $entry->time_period);
            $entryView->setTemplateVar("title", $entry->title);
            $entryView->setTemplateVar("description", $entry->description);

            $collection->addChildView("timeline_entry", $entryView);
        }

        return $collection->export();
    }

    /**
     * Example:
     *   wp_register_script('my-script', plugins_url('js/my-script.js', __FILE__), array('jquery'), '1.0', true);
     *   wp_print_scripts('my-script');
     * @return void
     */
    public function addScript() {
        // TODO: Implement addScript() method.
    }
}