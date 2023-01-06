<?php
/**
 * Boot the Framework
 *
 * @package   Succotash
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014-2022. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes.com
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$bcp = Backdrop\booted() ? Backdrop\app() : new Backdrop\Core\Application();

/**
 * Register default providers
 */
$bcp->provider( Backdrop\Custom\Portfolio\Portfolio\Provider::class );

/**
 * Boot the Framework
 */
$bcp->boot();