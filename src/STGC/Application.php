<?php

namespace STGC;

use Silex\Application as App;
use Symfony\Component\HttpFoundation\Response;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;


class Application extends App
{
	use App\TwigTrait;
	use App\UrlGeneratorTrait;
	use App\TranslationTrait;

	public function __construct( array $values = array() )
	{
		parent::__construct( $values );
	
		$this->register( new ServiceControllerServiceProvider() );
		$this->register( new UrlGeneratorServiceProvider() );
		$this->register( new TwigServiceProvider(), array(
		    'twig.path' => $values[ 'root_path' ] . '/STGC/Resources/views/',
		) );

		$controllerDir = $values[ 'root_path' ] . 'STGC/Controller/*Controller.php';
		$this->registerControllers( glob( $controllerDir ) );
	}

	private function registerControllers( array $controllers )
	{
		$app = $this;
		foreach( $controllers as $name ) {
			$name = str_replace( '.php', '', basename( $name ) );

			$service = strtolower( str_replace( 'Controller', '', $name ) );

			$name = '\\STGC\\Controller\\' . $name;

			$name::registerController( $this );
			$this[ 'controller.' . $service ] = $this->share( function() use( $app, $name ) { 
				return new $name( $this );
			} );
		}
	}
}
