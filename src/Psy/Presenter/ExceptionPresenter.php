<?php

/*
 * This file is part of Psy Shell
 *
 * (c) 2014 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Presenter;

use Psy\Presenter\ObjectPresenter;
use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * An Exception Presenter.
 */
class ExceptionPresenter extends ObjectPresenter
{
    /**
     * ExceptionPresenter can present Exceptions.
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function canPresent($value)
    {
        return $value instanceof \Exception;
    }


    /**
     * Get an array of exception object properties.
     *
     * @param object           $value
     * @param \ReflectionClass $class
     *
     * @return array
     */
    protected function getProperties($value, \ReflectionClass $class)
    {
        $props = array(
            'message'  => $value->getMessage(),
            'code'     => $value->getCode(),
            'file'     => $value->getFile(),
            'line'     => $value->getLine(),
            'previous' => $value->getPrevious(),
        );

        return array_merge(array_filter($props), parent::getProperties($value, $class));
    }
}
