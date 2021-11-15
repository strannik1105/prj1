<?php


namespace App\Controller\Admin;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;

class AdminController extends AbstractController
{

    /**
     * @Route ("/admin", name = "admin")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this -> render("/Admin/index.html.twig", [
            'text' => "For Admin",
            'users' => $users,
        ]);
    }
}