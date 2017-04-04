<?php

namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TweetProxyBundle\Helper\Twitter;

class DefaultController extends Controller
{
    //https://twitteroauth.com/
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('TweetProxyBundle:User');
        $query = $repository->findAll();

        $paginator = $this->get('knp_paginator');
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
        $Twitter = new Twitter;
        $connection = $Twitter->init();
        $statuses = $connection->get("users/show", ["screen_name" => $request->request->get('username')]);

        if (isset($statuses->errors)) {
            $message = [];
            foreach ($statuses->errors as $key => $value) {
                $message[] = $value->message;
            }
            $message = implode("<br>", $message);
            $this->addFlash(
                'warning',
                $message
            );

            return $this->redirectToRoute("tweet_proxy_homepage");
        }
        else
        {

        }

        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function userListAction()
    {
        var_dump($username);
        die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function profileAction($username)
    {
        var_dump($username);
        die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

    public function searchAction($term)
    {
        var_dump($username);
        die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

}
