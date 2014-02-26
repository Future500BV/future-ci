<?php

/**
 * This file is part of the Future CI package.
 * Future CI is licensed under MIT (https://github.com/Future500BV/future-ci/blob/master/LICENSE).
 */

namespace F500\CI\Suite;

/**
 * Class SuiteFactory
 *
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 * @copyright 2014 Future500 B.V.
 * @license   https://github.com/Future500BV/future-ci/blob/master/LICENSE MIT
 * @package   F500\CI\Suite
 */
class SuiteFactory
{

    /**
     * @param string $class
     * @param string $cn
     * @return Suite
     * @throws \InvalidArgumentException
     */
    public function create($class, $cn)
    {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('Class "%s" for suite "%s" does not exist.', $class, $cn));
        }

        $suite = new $class($cn);

        if (!$suite instanceof Suite) {
            throw new \InvalidArgumentException(sprintf(
                'Class "%s" for suite "%s" should implement F500\CI\Suite\Suite.',
                $class,
                $cn
            ));
        }

        return $suite;
    }
}
