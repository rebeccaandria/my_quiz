<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question/{id}", name="question")
     */
    public function index($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(question::class);
        $questions = $repo->findOneBy([
            'id' => $id
            ]);
        dump($questions);

        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
        ]);
    }
}
