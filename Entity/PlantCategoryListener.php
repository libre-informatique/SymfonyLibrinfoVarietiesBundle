<?php

namespace Librinfo\VarietiesBundle\Entity;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;

class PlantCategoryListener
{
    public function prePersist(PlantCategory $obj, LifecycleEventArgs $event)
    {
        dump('EntityListener prePersist', $obj, $event);
    }

    public function preUpdate(PlantCategory $obj, PreUpdateEventArgs $event)
    {
        dump('EntityListener preUpdate', $obj, $event);
    }

    public function preFlush(PlantCategory $obj, PreFlushEventArgs $event)
    {
        dump('EntityListener preFlush', $obj, $event);
    }
}