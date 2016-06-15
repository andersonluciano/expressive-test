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

class HelloAction
{
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {

        $name = $request->getAttribute('name');

        $query = $request->getQueryParams();
        $target = isset($query['target']) ? $query['target'] : 'World';

        return new HtmlResponse(
            $this->renderer->render('app::hello-world', ['target' => $name])
        );
    }
}