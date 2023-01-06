<?php

namespace Backdrop\Custom\Portfolio\Portfolio;

use Backdrop\Core\ServiceProvider;

class Provider extends ServiceProvider {
    	/**
	 * Binds the implementation of the attributes contract to the container.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return void
	 */
	public function register() {
		$this->app->singleton(  Component::class );

    }
    
	/**
	 * Boots the implementation of the attributes contract to the container.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return void
	 */
    public function boot() : void {
        $this->app->resolve( Component::class )->boot();
    }
}