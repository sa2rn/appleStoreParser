<?php

namespace IntField\ParserBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use IntField\ParserBundle\Entity\AppleStore;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use IntField\ParserBundle\Entity\AppleStoreHistory;

class AppleStoreHistorySubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate'
        );
    }
    
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $em = $args->getEntityManager();
        $entity = $args->getEntity();
        if ($entity instanceof AppleStore) {
            if ($args->hasChangedField('price')) {
                $history = new AppleStoreHistory();
                $history->setCreated(new \DateTime());
                $history->setField('price');
                $history->setValue($entity->getPrice());
                $entity->addHistory($history);
            }
            
            if ($args->hasChangedField('version')) {
                $history = new AppleStoreHistory();
                $history->setCreated(new \DateTime());
                $history->setField('version');
                $history->setValue($entity->getVersion());
                $entity->addHistory($history);
            }
        }
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof AppleStore) {
            $history = new AppleStoreHistory();
            $history->setCreated(new \DateTime());
            $history->setField('price');
            $history->setValue($entity->getPrice());
            $entity->addHistory($history);
        
            $history = new AppleStoreHistory();
            $history->setCreated(new \DateTime());
            $history->setField('version');
            $history->setValue($entity->getVersion());
            $entity->addHistory($history);
        }
    }
}