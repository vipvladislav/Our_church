<?php
namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index()
    {
        return $this->render('lucky/index.html.twig', []);
    }

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function blog()
    {
        return $this->render('lucky/blog.html.twig', []);
    }

    /**
     * @Route("/news", name="news")
     * @return Response
     */
    public function news()
    {
        return $this->render('lucky/news.html.twig', []);
    }

    /**
     * @Route("/{aaa}/liturgy_singl.html.twig", name="liturgy_singl.html.twig")
     * @param $aaa
     * @return Response
     */
    public function liturgySingl($aaa)
    {
        $result =  $this->render(/** @lang text */ 'lucky/liturgy_singl.html.twig', ['number' => $aaa]);
        $this->addFlash('success', $aaa);

        return $result;
    }

    /**
     * @Route("/liturgy", name="liturgy")
     * @return Response
     */
    public function liturgy()
    {
        return $this->render(/** @lang text */ 'lucky/liturgy.html.twig', []);
    }

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function contact()
    {
        return $this->render(/** @lang text */ 'lucky/contact.html.twig', []);
    }

    /**
     * @Route(path="/add-article")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function next(EntityManagerInterface $entityManager)
    {
        $category = new Category();
        $category->setTitle('qqqqq');

        $article = new Article();
        $article
            ->setImage('my-image')
            ->setContent('my-content')
            ->setTitle('my title')
            ->setCategories($category)
            ;

        $entityManager->persist($category);
        $entityManager->persist($article);
        $entityManager->flush();
        return new Response('Done!');

    }

    /**
     * @Route(path="/articles/{id}")
     * @param Article $article
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function getArticle(Article $article, EntityManagerInterface $entityManager)
    {
        $article
            ->setTitle('Update title')
            ->setContent('Update content')
            ->setImage('Update image')
        ;
        $entityManager->flush();

       return new Response($article->getTitle());

    }

    /**
     * @Route(path="/articles/delete/{id}")
     * @param Article $article
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function deleteArticle(Article $article, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($article);
        $entityManager->flush();

        return new Response('Deleted');
    }

    /**
     * @Route(path="/list")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function list(EntityManagerInterface $entityManager)
    {
        $articleRepo = $entityManager->getRepository(Article::class);
        $aticles = $articleRepo->findAll();

        dd($articleRepo->findByCategoryId(2));

        return new Response('List!');
    }

}