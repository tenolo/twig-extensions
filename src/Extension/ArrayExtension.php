<?php

namespace Tenolo\Twig\Extensions\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class ArrayExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ArrayExtension extends AbstractExtension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('merge_recursive', [$this, 'arrayMergeRecursive']),
            new TwigFilter('array_merge_recursive', [$this, 'arrayMergeRecursive']),
            new TwigFilter('array_replace', [$this, 'arrayReplace']),
            new TwigFilter('array_replace_recursive', [$this, 'arrayReplaceRecursive']),
        ];
    }

    /**
     * @param $arr1
     * @param $arr2
     *
     * @return array
     * @throws \Twig_Error_Runtime
     */
    public function arrayMergeRecursive($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new \Twig_Error_Runtime(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_merge_recursive($arr1, $arr2);
    }

    /**
     * @param $arr1
     * @param $arr2
     *
     * @return array
     * @throws \Twig_Error_Runtime
     */
    public function arrayReplace($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new \Twig_Error_Runtime(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_replace($arr1, $arr2);
    }

    /**
     * @param $arr1
     * @param $arr2
     *
     * @return array
     * @throws \Twig_Error_Runtime
     */
    public function arrayReplaceRecursive($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new \Twig_Error_Runtime(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_replace_recursive($arr1, $arr2);
    }
} 