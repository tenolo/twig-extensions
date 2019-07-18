<?php

namespace Tenolo\Twig\Extensions\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class FilesizeExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class FilesizeExtension extends AbstractExtension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('format_bytes', [$this, 'formatBytes']),
        ];
    }

    /**
     * @param        $bytes
     *
     * @param int    $decimals
     * @param string $decPoint
     * @param string $thousandsSep
     *
     * @return string
     */
    public function formatBytes($bytes, $decimals = 2, $decPoint = ',', $thousandsSep = '.')
    {
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;

        if ($bytes < $kb) {
            return $bytes.' B';
        }
        if ($bytes < $mb) {
            return number_format($bytes / $kb, $decimals, $decPoint, $thousandsSep).' KB';
        }
        if ($bytes < $gb) {
            return number_format($bytes / $mb, $decimals, $decPoint, $thousandsSep).' MB';
        }
        if ($bytes < $tb) {
            return number_format($bytes / $gb, $decimals, $decPoint, $thousandsSep).' GB';
        }

        return number_format($bytes / $tb, $decimals, $decPoint, $thousandsSep).' TB';
    }
}