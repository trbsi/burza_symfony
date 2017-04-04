<?php

namespace TweetProxyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tweets
 *
 * @ORM\Table(name="tweets")
 * @ORM\Entity(repositoryClass="TweetProxyBundle\Repository\TweetsRepository")
 */
class Tweets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tweet", type="string", length=150)
     */
    private $tweet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="tweet_id", type="integer")
     */
    private $tweetId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tweet
     *
     * @param string $tweet
     *
     * @return Tweets
     */
    public function setTweet($tweet)
    {
        $this->tweet = $tweet;

        return $this;
    }

    /**
     * Get tweet
     *
     * @return string
     */
    public function getTweet()
    {
        return $this->tweet;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tweets
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Tweets
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Tweets
     */
    public function setTweetId($tweetId)
    {
        $this->tweetId = $tweetId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getTweetId()
    {
        return $this->tweetId;
    }
}

