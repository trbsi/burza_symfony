<?php

namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class DefaultController extends Controller
{
	//https://twitteroauth.com/
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('TweetProxyBundle:User');
        $query = $repository->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->container->get('request_stack')->getCurrentRequest()->query->get('page', 1),
            20
        );

        // parameters to template
        return $this->render('TweetProxyBundle:Default:index.html.twig', array('pagination' => $pagination));
    }

    public function addUserAction(Request $request)
    {
        var_dump($request->request->get('username')); die();
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
