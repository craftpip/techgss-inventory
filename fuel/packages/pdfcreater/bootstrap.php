<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */
Autoloader::add_classes(array(
    'PDF' => __DIR__ . '/classes/pdfcreater.php',
    'datacardPDF' => __DIR__ . '/classes/datacardpdfconvert.php'
));


/* End of file bootstrap.php */
