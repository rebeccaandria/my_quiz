<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Entity\Question;
use App\Entity\Reponse;

class QuizController extends AbstractController
{
    /**
     * @Route("/quiz", name="quiz")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(categorie::class);

        $categories = $repo->findAll();

        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('quiz/home.html.twig', [
            'title' => "Bienvenue ici les amis",
            'age' => 31
        ]);
    }


     /**
     * @Route("/quiz/{categorie}", name="quiz_show")
     */
    public function show($categorie): Response
    {
        $repo = $this->getDoctrine()->getRepository(question::class);
        $questions = $repo->findOneBy([
            'id_categorie' => $categorie
            ]);
        dump($questions);

        $repo = $this->getDoctrine()->getRepository(reponse::class);
        $reponses = $repo->findBy([], [], 3,0);
        dump($reponses);

        return $this->render('quiz/show.html.twig', [
            'questions' => $questions,
           'reponses' => $reponses,
        ]);
    }
    
}
