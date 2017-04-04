<?php

namespace TweetProxyBundle\Repository;

/**
 * TweetsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TweetsRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTweetsPerUser($user_id, $limit = 20)
    {
        return $this->createQueryBuilder('tweet')
            ->where('tweet.userId = :user_id')
            ->setParameter('user_id', $user_id)
            ->setMaxResults($limit)
            ->orderBy("tweet.createdAt", 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
