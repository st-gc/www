<?php

namespace STGC\Controller;

use STGC\Application;

interface ControllerInterface
{
	/**
	 * Registers the Controller with the application
	 * @param Application $app
	 */
	static function registerController( Application $app );

	/**
	 * Registers the routes with the application
	 * @param Application $app
	 */
	static function registerRoutes( Application $app );

	/**
	 * Constructor
	 * @param Application $app
	 */
	function __construct( Application $app );

	/**
	 * Returns the App
	 * @return Application
	 */
	function getApp();
	
	/**
	 * @param Application
	 * @return ControllerInterface
	 */
	function setApp( Application $app );
}
