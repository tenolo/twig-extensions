<?php

namespace Tenolo\Twig\Extensions\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class ContentExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ContentExtension extends AbstractExtension
{

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('inline_compile', [$this, 'compileInline'], [
                'needs_environment' => true,
                'needs_context'     => true,
                'is_safe'           => ['all']
            ]),
        ];
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('inline_compile', [$this, 'compileInline'], [
                'needs_environment' => true,
                'needs_context'     => true,
                'is_safe'           => ['all']
            ]),
        ];
    }

    /**
     * @param \Twig_Environment $environment
     * @param                   $context
     * @param                   $string
     *
     * @return mixed|string
     */
    public function compileInline(\Twig_Environment $environment, $context, $string)
    {
        if (empty($string)) {
            return null;
        }

        return $environment->render($string, $context);
    }
}
