<?php

/**
 * This file is part of the Future CI package.
 * Future CI is licensed under MIT (https://github.com/Future500BV/future-ci/blob/master/LICENSE).
 */

namespace F500\CI\Task;

use F500\CI\Run\Toolkit;
use Psr\Log\LogLevel;

/**
 * Class DummyTask
 *
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 * @copyright 2014 Future500 B.V.
 * @license   https://github.com/Future500BV/future-ci/blob/master/LICENSE MIT
 * @package   F500\CI\Task
 */
class DummyTask extends BaseTask
{

    /**
     * @param Toolkit $toolkit
     * @return bool
     */
    public function run(Toolkit $toolkit)
    {
        $this->startRun($toolkit);
        $toolkit->getLogger()->log(LogLevel::INFO, 'Doing nothing (dummy task).');
        $this->finishRun($toolkit);

        return true;
    }
}
