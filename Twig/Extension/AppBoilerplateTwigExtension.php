<?php

namespace Nizar\AppBoilerplateBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\Request;

class AppBoilerplateTwigExtension extends \Twig_Extension
{
    // !\Twig_Extension methods
    public function getName()
    {
        return 'app_boilerplate';
    }
}
