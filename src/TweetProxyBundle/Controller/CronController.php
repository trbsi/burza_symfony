<?php
namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TweetProxyBundle\Helper\Twitter;
use TweetProxyBundle\Entity\Tweets;

class CronController extends Controller
{
    public function fetchTweetAction()
    {
        $Twitter = new Twitter;
        $connection = $Twitter->init();
        $results = $this->getDoctrine()->getRepository('TweetProxyBundle:User')->findAllWithTweets();
        $em = $this->getDoctrine()->getManager();

        foreach ($results as $result) {

            $tweets = $connection->get("statuses/user_timeline", ["screen_name" => $result["username"], 'count' => 20]);
            if (empty($tweets)) {
                continue;
            }

            foreach ($tweets as $tweet) {

                if ($tweet->id > $result["tweetId"]) {

                    $datetime = date("Y-m-d H:i:s", strtotime($tweet->created_at));
                    $datetime = new \DateTime($datetime);
                    $Tweets = new Tweets();
                    $Tweets->setTweet($tweet->text);
                    $Tweets->setCreatedAt($datetime);
                    $Tweets->setUserId($result["id"]);
                    $Tweets->setTweetId($tweet->id);
                    $em->persist($Tweets);
                    $em->flush();
                }
            }
        }

        return $this->render('TweetProxyBundle:Cron:cron.html.twig');
    }
}
