<?php

/**
 * contao-calendar-filter-tag
 *
 * Copyright © ContaoBlackForest
 *
 * @package   contao-calendar-filter-tag
 * @file      tl_module.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   LGPL-3.0+
 * @copyright Copyright 2016 ContaoBlackForest
 */

namespace ContaoBlackForest\Module\CalendarFilter\Tag\DataContainer;

use ContaoBlackForest\Module\CalendarFilter\Event\PostFilterInformationEvent;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PostFilterInformation extends Event
{
    public function getInformation(PostFilterInformationEvent $event, $name, EventDispatcher $eventDispatcher)
    {
        if ($event->getFilter() != 'tag') {
            return;
        }


        $information = array();

        foreach ($event->getEvents() as $eventItem) {
            if (empty($eventItem['tag'])) {
                continue;
            }

            $chunks = explode(',', $eventItem['tag']);
            foreach ($chunks as $chunk) {
                if (array_key_exists($chunk, $information)) {
                    continue;
                }

                $information[$chunk] = $chunk;
            }
        }

        $event->setInformation($information);
    }
}
