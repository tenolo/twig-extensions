<?php

namespace Tenolo\Twig\Extensions\Extension;

use Twig\Error\RuntimeError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

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
    public function getFunctions()
    {
        return [
            new TwigFunction('merge_recursive', [$this, 'arrayMergeRecursive']),
            new TwigFunction('array_merge_recursive', [$this, 'arrayMergeRecursive']),
            new TwigFunction('array_replace', [$this, 'arrayReplace']),
            new TwigFunction('array_replace_recursive', [$this, 'arrayReplaceRecursive']),
        ];
    }

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
     */
    public function arrayMergeRecursive($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new RuntimeError(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_merge_recursive($arr1, $arr2);
    }

    /**
     * @param $arr1
     * @param $arr2
     *
     * @return array
     */
    public function arrayReplace($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new RuntimeError(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_replace($arr1, $arr2);
    }

    /**
     * @param $arr1
     * @param $arr2
     *
     * @return array
     */
    public function arrayReplaceRecursive($arr1, $arr2)
    {
        if (!is_array($arr1) || !is_array($arr2)) {
            throw new RuntimeError(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($arr1), gettype($arr2)));
        }

        return array_replace_recursive($arr1, $arr2);
    }
} 