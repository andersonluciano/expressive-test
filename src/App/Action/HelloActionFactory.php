<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 6/15/16
 * Time: 2:54 PM
 */

namespace App\Action;


use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HelloActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new HelloAction($container->get(TemplateRendererInterface::class));
    }
}