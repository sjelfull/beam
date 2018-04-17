<?php
/**
 * Beam plugin for Craft CMS
 *
 * Generate CSVs and XLS files in your templates
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Beam
 * @since     1.0.0
 */

namespace Craft;

class BeamPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init ()
    {
        parent::init();

        require_once __DIR__ . '/vendor/autoload.php';
    }

    /**
     * @return mixed
     */
    public function getName ()
    {
        return Craft::t('Beam');
    }

    /**
     * @return mixed
     */
    public function getDescription ()
    {
        return Craft::t('Generate CSVs and XLS files in your templates');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl ()
    {
        return 'https://superbig.co/plugins/beam';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl ()
    {
        return 'https://superbig.co/plugins/beam/feed';
    }

    /**
     * @return string
     */
    public function getVersion ()
    {
        return '1.0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion ()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper ()
    {
        return 'Superbig';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl ()
    {
        return 'https://superbig.co';
    }
}
