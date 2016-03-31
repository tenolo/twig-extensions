<?php

namespace Tenolo\Twig\Extensions\Extension;

use Tenolo\Utilities\Utils\ColorUtil;

/**
 * Class ColorExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ColorExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('rgb', array($this, 'hex2rgb')),
            new \Twig_SimpleFilter('rgb_r', array($this, 'hex2rgb_r')),
            new \Twig_SimpleFilter('rgb_g', array($this, 'hex2rgb_g')),
            new \Twig_SimpleFilter('rgb_b', array($this, 'hex2rgb_b')),
        );
    }

    /**
     * @param $hex
     * @return array
     */
    public function hex2rgb($hex)
    {
        return ColorUtil::hex2rgb($hex);
    }

    /**
     * @param $hex
     * @return string
     */
    public function hex2rgb_r($hex)
    {
        return ColorUtil::hex2rgb($hex)['r'];
    }

    /**
     * @param $hex
     * @return string
     */
    public function hex2rgb_g($hex)
    {
        return ColorUtil::hex2rgb($hex)['b'];
    }

    /**
     * @param $hex
     * @return string
     */
    public function hex2rgb_b($hex)
    {
        return ColorUtil::hex2rgb($hex)['b'];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tenolo_color';
    }
} 