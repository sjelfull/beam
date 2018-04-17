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
use XLSXWriter;

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

    public function xlsx ($options = [ ])
    {
        $tempPath = craft()->path->getTempPath() . '/beam/';

        if ( empty($options['headers']) && empty($options['rows']) ) {
            return null;
        }

        IOHelper::ensureFolderExists($tempPath);

        // Load the CSV document from a string
        $writer    = new XLSXWriter();
        $filename  = !empty($options['filename']) ? $options['filename'] : 'output.xlsx';
        $sheetName = isset($options['sheetName']) ? $options['sheetName'] : 'Sheet';

        if ( !empty($options['header']) ) {
            $headers = [ ];

            foreach ($options['header'] as $header) {
                if (is_array($header)) {
                  $headers[$header['header']] = $header['format'];
                } else {
                  $headers[ $header ] = 'string';
                }
            }

            // Insert the headers
            $writer->writeSheetHeader($sheetName, $headers);
        }

        $filename = filter_var($filename, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

        foreach ($options['rows'] as $row) {
            $writer->writeSheetRow($sheetName, $row);
        }

        //$writer->writeSheet($data);
        $writer->writeToFile($tempPath . $filename);

        $mimeType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

        craft()->request->sendFile($filename, IOHelper::getFileContents($tempPath . $filename), array( 'forceDownload' => true ));
        craft()->end();
    }
}
