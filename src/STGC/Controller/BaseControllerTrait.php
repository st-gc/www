<?php
namespace STGC\Controller;

use STGC\Application;

trait BaseControllerTrait
{
	/**
	 * @var Application
	 */
	protected $app;
	
	/**
	 * Registers the Controller with the application
	 * @param Appliaction $app
	 */
	public static function registerController( Application $app )
	{
		self::registerRoutes( $app );
	}
	
	/**
	 * Constructor
	 * @param Application $app
	 */
	public function __construct( Application $app )
	{
		$this->setApp( $app );
	}

	/**
	 * @return Application
	 */
	public function getApp( )
	{
		return $this->app;
	}

	/**
	 * @param Application
	 * @return ControllerInterface
	 */
	public function setApp( Application $app )
	{
		$this->app = $app;

		return $this;
	}
}
