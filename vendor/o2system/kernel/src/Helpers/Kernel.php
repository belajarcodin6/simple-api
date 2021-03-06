<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

if ( ! function_exists( 'kernel' ) ) {
    /**
     * kernel
     *
     * Convenient shortcut for O2System Kernel Instance
     *
     * @return O2System\Kernel
     */
    function kernel()
    {
        if ( class_exists( 'O2System\Framework', false ) ) {
            return O2System\Framework::getInstance();
        }

        return O2System\Kernel::getInstance();
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'profiler' ) ) {
    /**
     * profiler
     *
     * Convenient shortcut for O2System Gear Profiler service.
     *
     * @return O2System\Gear\Profiler
     */
    function profiler()
    {
        return kernel()->getService( 'profiler' );
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'language' ) ) {
    /**
     * language
     *
     * Convenient shortcut for O2System Kernel Language service.
     *
     * @return O2System\Kernel\Services\Language|O2System\Framework\Services\Language
     */
    function language()
    {
        return kernel()->getService( 'language' );
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'logger' ) ) {
    /**
     * logger
     *
     * Convenient shortcut for O2System Kernel Logger service.
     *
     * @return O2System\Kernel\Services\Logger
     */
    function logger()
    {
        $args = func_get_args();

        if ( count( $args ) ) {
            $logger =& kernel()->getService( 'logger' );

            return call_user_func_array( [ &$logger, 'log' ], $args );
        }

        return kernel()->getService( 'logger' );
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'shutdown' ) ) {
    /**
     * shutdown
     *
     * Convenient shortcut for O2System Kernel Shutdown service.
     *
     * @return O2System\Kernel\Services\Shutdown
     */
    function shutdown()
    {
        return kernel()->getService( 'shutdown' );
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'input' ) ) {
    /**
     * input
     *
     * Convenient shortcut for O2System Kernel Input Instance
     *
     * @return O2System\Kernel\Http\Input|O2System\Kernel\Cli\Input
     */
    function input()
    {
        return kernel()->getService( 'input' );
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists( 'output' ) ) {
    /**
     * output
     *
     * Convenient shortcut for O2System Kernel Browser Instance
     *
     * @return O2System\Kernel\Http\Output|O2System\Kernel\Cli\Output
     */
    function output()
    {
        return kernel()->getService( 'output' );
    }
}

// ------------------------------------------------------------------------