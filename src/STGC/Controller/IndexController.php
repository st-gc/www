<?php
namespace STGC\Controller;

use STGC\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController implements ControllerInterface
{
	use BaseControllerTrait;
	
	public static function registerRoutes( Application $app )
	{
		$app->get( '/', "controller.index:indexAction" );
		$app->get( '/rules', "controller.index:rulesAction" );
	}

	public function indexAction( )
	{
		return $this->getApp()->render( 'Index/index.html.twig' );
	}

	public function rulesAction( )
	{
		return $this->getApp()->render( 'Index/rules.html.twig' );
	}
}
