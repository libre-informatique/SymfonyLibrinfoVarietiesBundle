<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Librinfo\DoctrineBundle\EventListener\Traits\ClassChecker;
use Psr\Log\LoggerAwareInterface;
use Librinfo\DoctrineBundle\EventListener\Traits\Logger;

/**
 * Not used any more. Remove ???
 */
class PlantCategoryListener implements LoggerAwareInterface, EventSubscriber
{
    use ClassChecker, Logger;

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate',
            'preFlush',
        ];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
    }

    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
    }

    public function preFlush(PreFlushEventArgs $eventArgs)
    {
    }
}
