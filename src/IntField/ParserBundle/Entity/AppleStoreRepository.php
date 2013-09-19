<?php

namespace IntField\ParserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * AppleStoreRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppleStoreRepository extends EntityRepository
{
    public function findByAppleId($appleId)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM IntFieldParserBundle:AppleStore p WHERE p.appleId = :appleId')
            ->setParameters(array(
                'appleId' => $appleId,
        ));
    
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}
