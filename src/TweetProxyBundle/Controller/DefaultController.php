<?php

namespace TweetProxyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TweetProxyBundle\Helper\Twitter;
use TweetProxyBundle\Entity\User;

class DefaultController extends Controller
{
    //https://twitteroauth.com/
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('TweetProxyBundle:User');
        $query = $repository->findAllPagination();

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
        } else {
            //check if user exists
            $result = $this->getDoctrine()->getRepository('TweetProxyBundle:User')->findByUsername($statuses->screen_name);
            if (!empty($result)) {
                $this->addFlash(
                    'warning',
                    'This user already exists'
                );

                return $this->redirectToRoute("tweet_proxy_homepage");
            }


            $User = new User;
            $User->setName($statuses->name);
            $User->setUsername($statuses->screen_name);
            $User->setUrl($statuses->url);
            $User->setDescription($statuses->description);
            $User->setProfileImage($statuses->profile_image_url);
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($User);
            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

            $this->addFlash(
                'success',
                'User has been added'
            );

            return $this->redirectToRoute("tweet_proxy_homepage");
        }
    }


    public function profileAction($username)
    {
        $result = $this->getDoctrine()->getRepository('TweetProxyBundle:User')->findByUsername($username);
        if (empty($result)) {
            $this->addFlash(
                'warning',
                'User doesn\'t exists'
            );

            return $this->redirectToRoute("tweet_proxy_homepage");
        }

        return $this->render('TweetProxyBundle:Default:profile.html.twig', ['result' => $result]);
    }

    public function searchAction($term)
    {
        var_dump($username);
        die();
        return $this->render('TweetProxyBundle:Default:index.html.twig');
    }

}
