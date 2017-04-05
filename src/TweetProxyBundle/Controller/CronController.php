<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TweetProxyBundle\Entity\Tweets;
use TweetProxyBundle\Helper\Twitter;

class CronController extends Controller
{
    public function fetchTweetAction()
    {
        $Twitter = new Twitter();
        $connection = $Twitter->init();
        $results = $this->getDoctrine()->getRepository('TweetProxyBundle:User')->findAllWithTweets();
        $em = $this->getDoctrine()->getManager();

        foreach ($results as $result) {
            $tweets = $connection->get('statuses/user_timeline', array('screen_name' => $result['username'], 'count' => 20));
            if (empty($tweets)) {
                continue;
            }

            foreach ($tweets as $tweet) {
                if ($tweet->id > $result['tweetId']) {
                    $datetime = date('Y-m-d H:i:s', strtotime($tweet->created_at));
                    $datetime = new \DateTime($datetime);
                    $Tweets = new Tweets();
                    $Tweets->setTweet($tweet->text);
                    $Tweets->setCreatedAt($datetime);
                    $Tweets->setUserId($result['id']);
                    $Tweets->setTweetId($tweet->id);
                    $em->persist($Tweets);
                    $em->flush();
                }
            }
        }

        return $this->render('TweetProxyBundle:Cron:cron.html.twig');
    }
}
