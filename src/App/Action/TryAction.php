<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 6/15/16
 * Time: 2:39 PM
 */

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TryAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {

        
    }
}
