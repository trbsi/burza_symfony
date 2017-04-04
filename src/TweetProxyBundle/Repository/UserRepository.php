<?php

namespace TweetProxyBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        return $this->createQueryBuilder("t");
    }

    public function findByUsername($username)
    {
        $query = $this->createQueryBuilder("t")
        ->where('t.username = :username')
        ->setParameter('username', $username)
        ->getQuery()
        ;

        return $query->getOneOrNullResult();
    }
}
