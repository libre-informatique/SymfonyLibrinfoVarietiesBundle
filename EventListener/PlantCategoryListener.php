<?php

namespace Librinfo\VarietiesBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Librinfo\DoctrineBundle\EventListener\Traits\ClassChecker;
use Psr\Log\LoggerAwareInterface;
use Librinfo\DoctrineBundle\EventListener\Traits\Logger;

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
            'preFlush'
        ];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        dump('PlantCategoryListener#prePersist', $eventArgs);
    }

    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        dump('PlantCategoryListener#preUpdate', $eventArgs);
    }

    public function preFlush(PreFlushEventArgs $eventArgs)
    {
        dump('PlantCategoryListener#preFlush', $eventArgs);
    }
}
