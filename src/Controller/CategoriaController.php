<?php

namespace App\Controller;
use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    #[Route('/categoria', name: 'categoria')]
    public function index(CategoriaRepository $categoriaRepository): Response
    {

        $categorias = $categoriaRepository-->findAll();
        dump($categorias);
        return $this->render('categoria/index.html.twig', [
            'controller_name' => 'CategoriaController',
        ]);
    }
}
