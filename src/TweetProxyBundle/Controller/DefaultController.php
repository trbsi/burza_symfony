<?php

namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	//https://twitteroauth.com/
    public function indexAction()
    {
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }
}
