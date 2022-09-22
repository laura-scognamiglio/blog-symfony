<?php

namespace App\Controller;

//!rajouter l'entité Article r recuperer le repository
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(EntityManagerInterface $entityManager): Response
    {
       $article = $entityManager->getRepository(Article::class);
    //    $article = $this->$entityManager->getRepository(Article::class)->findAll();
       $allArticle = $article->findAll();
       dump($article);
    //    $article = 
       // $obj->methodeFindall();
        //!next step?
        // $message = $messageGenerator->getHappyMessage();
        // $this->addFlash('success', $message);
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $allArticle,

        ]);
    }
}
//? pr recuperer des données de la base de données mettre l'entity manager en parametre de la fonction index
//? puis utiliser la methode getRepository() de l'entity manager pour recuperer le repository de l'entité Article
//? mettre le chemin d'accès à l'entité 
//! ne pas copier coller les namspace sinon ca ne marche pas 
//accolade ds les routes pr mettre l'id en parametre par exmple 
//!regarder l'injection de dependances 

//? pr les form supprimmer les champs pas necessaire  ds le builder et/ou add les submit sous le build 
//?