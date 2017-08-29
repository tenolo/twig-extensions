<?php

namespace Tenolo\Twig\Extensions\Extension;

use Tenolo\Utilities\Utils\ColorUtil;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class ColorExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ColorExtension extends AbstractExtension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('rgb', [$this, 'hex2rgb']),
            new TwigFilter('rgb_r', [$this, 'hex2rgb_r']),
            new TwigFilter('rgb_g', [$this, 'hex2rgb_g']),
            new TwigFilter('rgb_b', [$this, 'hex2rgb_b']),
            new TwigFilter('hsl', [$this, 'hex2hsl']),
            new TwigFilter('hsl_l', [$this, 'hex2hsl_l']),
            new TwigFilter('hsl_h', [$this, 'hex2hsl_h']),
            new TwigFilter('hsl_s', [$this, 'hex2hsl_s']),
        ];
    }

    /**
     * @param $hex
     *
     * @return array
     */
    public function hex2rgb($hex)
    {
        return ColorUtil::hex2rgb($hex);
    }

    /**
     * @param $hex
     *
     * @return string
     */
    public function hex2rgb_r($hex)
    {
        return ColorUtil::hex2rgb($hex)['r'];
    }

    /**
     * @param $hex
     *
     * @return string
     */
    public function hex2rgb_g($hex)
    {
        return ColorUtil::hex2rgb($hex)['b'];
    }

    /**
     * @param $hex
     *
     * @return string
     */
    public function hex2rgb_b($hex)
    {
        return ColorUtil::hex2rgb($hex)['b'];
    }

    /**
     * @param $hex
     *
     * @return array
     */
    public function hex2hsl($hex)
    {
        return ColorUtil::hex2hsl($hex);
    }

    /**
     * @param $hex
     *
     * @return float
     */
    public function hex2hsl_l($hex)
    {
        return ColorUtil::hex2hsl($hex)['l'];
    }

    /**
     * @param $hex
     *
     * @return float
     */
    public function hex2hsl_h($hex)
    {
        return ColorUtil::hex2hsl($hex)['h'];
    }

    /**
     * @param $hex
     *
     * @return float
     */
    public function hex2hsl_s($hex)
    {
        return ColorUtil::hex2hsl($hex)['s'];
    }
}