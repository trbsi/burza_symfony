<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('tweet_proxy_homepage', new Route('/tweet', array(
    '_controller' => 'TweetProxyBundle:Default:index',
)));

return $collection;
