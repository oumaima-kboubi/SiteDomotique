<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/home_page", name="home_page")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if($authorizationChecker->isGranted('ROLE_ADMIN')) {
            return $this->render('admin/admin_home.html.twig');
        } elseif ($authorizationChecker->isGranted('ROLE_PROPRIETAIRE')) {
            return $this->render('proprietaire/proprietaire_home.html.twig');
        } elseif($authorizationChecker->isGranted('ROLE_HABITANT')){
            return $this->render('habitant/habitant_home.html.twig');
        } else {
            return $this->render('@FOSUser/Security/login.html.twig');
        }
    }

    /**
     * @Route("/",name="home_page.user")
     */
    public function home() {
        return $this->render('home_page/home.html.twig');
    }
}
