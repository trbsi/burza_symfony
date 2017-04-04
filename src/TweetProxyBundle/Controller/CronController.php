<?php
namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TweetProxyBundle\Helper\Twitter;

class CronController extends Controller
{
    public function fetchTweetAction()
    {
        $Twitter = new Twitter;
        $connection = $Twitter->init();
        $results = $this->getDoctrine()->getRepository('TweetProxyBundle:User')->findAll();
        foreach($results as $result)
        {
            $tweets = $connection->get("statuses/user_timeline", ["screen_name" => $result->username, 'count' => 20]);
            foreach($tweets as $tweet)
            {
                
            }
        }

    }
}
