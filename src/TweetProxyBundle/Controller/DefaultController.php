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

    public function addUserAction($username)
    {
    	var_dump($username); die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function userListAction()
    {
    	var_dump($username); die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function profileAction($username)
    {
    	var_dump($username); die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function searchAction($term)
    {
    	var_dump($username); die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

}
