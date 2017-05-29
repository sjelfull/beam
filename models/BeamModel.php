<?php
/**
 * Beam plugin for Craft CMS
 *
 * Beam Model
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Beam
 * @since     1.0.0
 */

namespace Craft;

class BeamModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'someField'     => array(AttributeType::String, 'default' => 'some value'),
        ));
    }

}