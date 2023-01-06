

/**
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of WordPress that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file to
 * configure how your assets are handled in the build process.
 *
 * @link https://laravel.com/docs/5.6/mix
 *
 * @package   Initiator
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2020 Benjamin Lu
 * @link      https://github.com/benlumia007/initiator
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

 // Import All Required Packages
 const mix = require( 'laravel-mix' );

 /*
 * -----------------------------------------------------------------------------
 * Theme Export Process
 * -----------------------------------------------------------------------------
 * Configure the export process in `webpack.mix.export.js`. This bit of code
 * should remain at the top of the file here so that it bails early when the
 * `export` command is run.
 * -----------------------------------------------------------------------------
 */

if ( process.env.export ) {
	const exportTheme = require( './webpack.mix.export.js' );
	return;
}

/*
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 */
mix.version();