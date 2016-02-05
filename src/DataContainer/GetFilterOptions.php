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

use ContaoBlackForest\Module\CalendarFilter\Event\GetFilterOptionsEvent;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class GetFilterOptions extends Event
{
    public function addFilterOptions(GetFilterOptionsEvent $event, $name, EventDispatcher $eventDispatcher)
    {
        if ($event->hasOption('tag')) {
            return;
        }

        $event->setOption('tag', $GLOBALS['TL_LANG']['tl_module']['filterPropertyTags']);
    }
}
