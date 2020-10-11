<?php
namespace App\Controller;

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

//    /**
//     * @param $aaa
//     * @return Response
//     * @Route("/{aaa}/blog", name="blog_list")
//     */
//    public function index($aaa)
//    {
//        $result =  $this->render('lucky/index.html.twig', ['number' => $aaa]);
//        $this->addFlash('success', $aaa);
//
//        return $result;
//    }

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

}