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
		$app->get( '/membership', "controller.index:membershipAction" );
		$app->get( '/thank-you', "controller.index:thankyouAction" );
		$app->get( '/register',
			function() use( $app ) {
				return $app->redirect( 'http://forum.st-gc.org/ucp.php?mode=register' );
			}
		);
	}

	public function indexAction( )
	{
		return $this->getApp()->render( 'Index/index.html.twig' );
	}

	public function rulesAction( )
	{
		return $this->getApp()->render( 'Index/rules.html.twig' );
	}
	
	public function membershipAction()
	{
		return $this->getApp()->render( 'Index/membership.html.twig' );
	}
	
	public function thankyouAction()
	{
		return $this->getApp()->render( 'Index/thankyou.html.twig' );
	}
}
