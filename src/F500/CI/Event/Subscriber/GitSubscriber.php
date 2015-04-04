<?php

/**
 * This file is part of the Future CI package.
 * Future CI is licensed under MIT (https://github.com/f500/future-ci/blob/master/LICENSE).
 */

namespace F500\CI\Event\Subscriber;

use F500\CI\Event\BuildRunEvent;
use F500\CI\Event\Events;
use F500\CI\Vcs\GitCommit;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class TimerSubscriber
 *
 * @copyright 2014 Future500 B.V.
 * @license   https://github.com/f500/future-ci/blob/master/LICENSE MIT
 * @package   F500\CI\Event\Subscriber
 */
class GitSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(Events::BuildStarted => array(array('onBuildStarted', 10)));
    }

    /**
     * Registers the commit information of the current project directory with the build.
     *
     * @param BuildRunEvent $event
     *
     * @return void
     */
    public function onBuildStarted(BuildRunEvent $event)
    {
        $projectDirectory = $event->getBuild()->getProjectDir();
        $commit = GitCommit::load($projectDirectory);
        if ($commit) {
            $event->getBuild()->initiatedBy($commit);
        }
    }
}
