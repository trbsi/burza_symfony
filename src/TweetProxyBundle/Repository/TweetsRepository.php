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
            ->getResult();
    }

    public function searchTweets($doctrine, $term = NULL, $user_id = NULL)
    {
        $em = $doctrine->getManager();

        $param = [];
        if ($term != NULL && $user_id != NULL) {
            $query = '
                SELECT tweets.*, user.username
                FROM tweets
                INNER JOIN user ON (user.id = tweets.user_id)
                WHERE MATCH (tweet) AGAINST (:term IN BOOLEAN MODE) AND user_id = :user_id
            ';
            $param["user_id"] = $user_id;
        } elseif ($term != NULL) {
            $query = '
                SELECT tweets.*, user.username
                FROM tweets
                INNER JOIN user ON (user.id = tweets.user_id)
            WHERE MATCH (tweet) AGAINST (:term IN BOOLEAN MODE)
            ';
            $param["term"] = $term;
        } elseif ($user_id != NULL) {
            $query = '
                SELECT tweets.*, user.username
                INNER JOIN user ON (user.id = tweets.user_id)
                FROM tweets WHERE user_id = :user_id';
            $param["user_id"] = $user_id;
            $param["term"] = $term;
        }

        $stmt = $em->getConnection()->prepare($query);
        foreach ($param as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
