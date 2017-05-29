<?php
/**
 * Beam plugin for Craft CMS
 *
 * Beam Variable
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Beam
 * @since     1.0.0
 */

namespace Craft;

class BeamVariable
{
    /**
     */
    public function csv($options = [])
    {
        return craft()->beam->csv($options);
    }
}