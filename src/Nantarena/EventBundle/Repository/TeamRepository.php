<?php

namespace Nantarena\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Nantarena\EventBundle\Entity\Event;
use Nantarena\UserBundle\Entity\User;

/**
 * TeamRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamRepository extends EntityRepository
{
    public function findByEvent(Event $event)
    {
        return $this->createQueryBuilder('t')
            ->join('t.creator', 'c')
            ->addSelect('c')
            ->join('t.members', 'm')
            ->addSelect('m')
            ->leftJoin('t.tournaments', 'to')
            ->addSelect('to')
            ->leftJoin('to.game', 'g')
            ->addSelect('g')
            ->where('t.event = :event')
            ->setParameter('event', $event)
            ->getQuery()
            ->getResult();
    }
}
