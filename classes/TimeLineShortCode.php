<?php
/**
 * Created by PhpStorm.
 * User: bryce
 * Date: 5/24/15
 * Time: 8:15 PM
 */

namespace MagicTimeLine;


use MagicTimeLine\Model\Entry;
use MagicTimeLine\Model\TimeLine;
use WordWrap\ShortCodeScriptLoader;
use WordWrap\View\View;
use WordWrap\View\ViewCollection;

class TimeLineShortCode extends ShortCodeScriptLoader{

    /**
     * @param  $atts array inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {

        $timeLine = TimeLine::find_one($atts["id"]);

        $collection = new ViewCollection($this->lifeCycle, "front_end_container");

        $collection->setTemplateVar("timeline_title", $timeLine->title);
        $collection->setTemplateVar("top_image", $timeLine->top_image);
        $collection->setTemplateVar("top_image_alt", $timeLine->top_image_alt);

        $entries = Entry::find_for_timeline($timeLine);

        foreach($entries as $entry) {
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