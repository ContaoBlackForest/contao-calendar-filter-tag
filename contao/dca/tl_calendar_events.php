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

\Bit3\Contao\MetaPalettes\MetaPalettes::appendFields(
    'tl_calendar_events',
    'title',
    array('tag',)
);

$fields = array(
    'tag' => array (
        'label'            => &$GLOBALS['TL_LANG']['tl_calendar_events']['tag'],
        'exclude' => true,
        'search' => true,
        'sorting' => true,
        'flag' => 1,
        'inputType' => 'text',
        'eval' =>
            array (
                'maxlength' => 255,
            ),
        'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
);

$GLOBALS['TL_DCA']['tl_calendar_events']['fields'] =
    array_merge($fields, $GLOBALS['TL_DCA']['tl_calendar_events']['fields']);

unset($fields);
