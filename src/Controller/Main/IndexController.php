<?php


namespace App\Controller\Main;


use App\Form\RegisterType;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class IndexController extends AbstractController
{

    /**
     * @Route ("/", name = "home")
     */
    public function index(Security $security)
    {

        $user = $security->getUser();
        if($security->isGranted('IS_AUTHENTICATED_FULLY') || $security->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            $username = $user->getUserIdentifier();
        else
            $username = "";
        ///$username = $user->getUserIdentifier();
        //if($username == null)
        //    $username = "";
        return $this -> render("/Main/index.html.twig", [
            'text' => "Something Text",
            'username' => $username,
        ]);
    }
}