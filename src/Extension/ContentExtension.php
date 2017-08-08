<?php

namespace Tenolo\Twig\Extensions\Extension;

/**
 * Class ContentExtension
 *
 * @package Tenolo\Twig\Extensions\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ContentExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('inline_compile', [$this, 'compileInline'], [
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
            new \Twig_SimpleFilter('inline_compile', [$this, 'compileInline'], [
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
        return $environment->render($string, $context);
    }
}
