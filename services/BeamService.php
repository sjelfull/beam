<?php
/**
 * Beam plugin for Craft CMS
 *
 * Beam Service
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Beam
 * @since     1.0.0
 */

namespace Craft;

use League\Csv\Writer;
use League\Csv\Reader;

class BeamService extends BaseApplicationComponent
{
    /**
     */
    public function csv ($options = [ ])
    {
        if ( empty($options['headers']) && empty($options['rows']) ) {
            return null;
        }

        // Load the CSV document from a string
        $csv      = Writer::createFromString('');
        $filename = !empty($options['filename']) ? $options['filename'] : 'output.csv';

        if ( !empty($options['header']) ) {
            // Insert the headers
            $csv->insertOne($options['header']);
        }

        // Insert all the rows
        $csv->insertAll($options['rows']);

        $csv->output($filename);
    }

    public function read ($options = [ ])
    {

    }

}