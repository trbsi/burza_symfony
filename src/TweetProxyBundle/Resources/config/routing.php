<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('tweet_proxy_homepage', new Route('/tweet', array(
    '_controller' => 'TweetProxyBundle:Default:index',
)));

$collection->add('add_user', new Route('/add_user/{username}', array(
    '_controller' => 'TweetProxyBundle:Default:addUser',
)));

$collection->add('user_list', new Route('/user_list', array(
    '_controller' => 'TweetProxyBundle:Default:userList',
)));

$collection->add('profile', new Route('/profile/{username}', array(
    '_controller' => 'TweetProxyBundle:Default:profile',
)));

$collection->add('search', new Route('/search/{term}', array(
    '_controller' => 'TweetProxyBundle:Default:search',
)));


//CRON
$collection->add('search', new Route('/cron/fetch-tweet', array(
    '_controller' => 'TweetProxyBundle:Cron:fetchTweet',
)));

return $collection;
