<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentFormType;
//!rajouter l'entité Commente pr recuperer le repository
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

        
        $comment= new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);
        $form_comment = $form->createView();

        $article = $entityManager->getRepository(Article::class);
        $allArticle = $article->findAll();
    
 
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $allArticle,
            //*il faut mieux appeler la methode de creation de vue pr passer le form
            'comment_form' => $form_comment,

        ]);
    }

    // public function articleSolo(EntityManagerInterface $entityManager): Response
    // {
    //     //tetey
    // }

}
//? pr recuperer des données de la base de données mettre l'entity manager en parametre de la fonction index
//? puis utiliser la methode getRepository() de l'entity manager pour recuperer le repository de l'entité Article
//? mettre le chemin d'accès à l'entité   #[Route('/article', name: 'app_article')]
//! ne pas copier coller les namspace sinon ca ne marche pas 
//accolade ds les routes pr mettre l'id en parametre par exmple 
//!regarder l'injection de dependances 

//? pr les form supprimmer les champs pas necessaire  ds le builder et/ou add les submit sous le build 
//?

