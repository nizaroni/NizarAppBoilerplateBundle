<?php

namespace Nizar\AppBoilerplateBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\Request;

class AppBoilerplateTwigExtension extends \Twig_Extension
{
    protected $request;


    // !AppBoilerplateTwigExtension methods
    public function __construct (Request $request)
    {
        $this->request = $request;
    }

    public function getControllerName()
    {
        $controllerName = $this->request->get ('_template')->get ('controller');

        if (empty ($controllerName)) {
            $pattern = "#Controller\\\([a-zA-Z]*)Controller#";

            if (!preg_match ($pattern, $this->request->get ('_controller'), $matches))
                return false;

            $controllerName = $matches[1];
        }

        return strtolower ($controllerName);
    }

    public function getActionName()
    {
        $actionName = $this->request->get ('_template')->get ('name');

        if (empty ($actionName)) {
            $pattern = "#::([a-zA-Z]*)Action#";

            if (!preg_match ($pattern, $this->request->get ('_controller'), $matches))
                return false;

            $actionName = $matches[1];
        }

        return strtolower ($actionName);
    }


    // !\Twig_Extension methods
    public function getFunctions()
    {
        return array (
            'get_controller_name' => new \Twig_Function_Method ($this, 'getControllerName'),
            'get_action_name'     => new \Twig_Function_Method ($this, 'getActionName')
        );
    }

    public function getName()
    {
        return 'app_boilerplate';
    }
}
