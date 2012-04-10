<?php

namespace Nizar\AppBoilerplateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AppBoilerplateController extends Controller
{
    /**
     * @Route("/boilerplate/hello/{name}")
     * @Template()
     */
    public function helloAction ($name)
    {
        return array ('name' => $name);
    }
}
