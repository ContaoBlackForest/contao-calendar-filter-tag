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

use ContaoBlackForest\Module\CalendarFilter\Event\PostFilterEventsEvent;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PostFilterEvents extends Event
{
    public function getFilteredEvents(PostFilterEventsEvent $event, $name, EventDispatcher $eventDispatcher)
    {
        if ($event->getField() != 'tag') {
            return;
        }

        $events = $event->getEvents();
        $this->filterEvents($events, $event->getFilter());
        $event->setEvents($events);
    }

    protected function filterEvents(&$events, $filter)
    {
        foreach ($events as $index => $value) {
            if (!array_key_exists('tag', $value)) {
                $this->filterEvents($value, $filter);
            }

            $chunks = explode(',', $value['tag']);
            if ((!in_array($filter, $chunks)
                 && array_key_exists('tag', $value))
                || empty($value)
            ) {
                unset($events[$index]);
            }
        }
    }
}
