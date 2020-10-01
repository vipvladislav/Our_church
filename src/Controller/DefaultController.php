<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/{aaa}/blog", name="blog_list")
     */
    public function index($aaa)
    {
        return $this->render('lucky/number.html.twig', ['number' => $aaa]);
    }

//    /**
//     * @param $aaa
//     * @return Response
//     * @Route("/{aaa}/blog", name="blog_list")
//     */
//    public function index($aaa)
//    {
//        $result =  $this->render('lucky/number.html.twig', ['number' => $aaa]);
//        $this->addFlash('success', $aaa);
//
//        return $result;
//    }

    /**
     * @Route("/{aaa}/blog_all.html.twig", name="blog_all.html.twig")
     * @param $aaa
     * @return Response
     */
    public function blogAll($aaa)
    {
        $result =  $this->render('lucky/blog_all.html.twig', ['number' => $aaa]);
        $this->addFlash('success', $aaa);

        return $result;
    }

    /**
     * @Route("/{aaa}/news.html.twig", name="news.html.twig")
     * @param $aaa
     * @return Response
     */
    public function newsAll($aaa)
    {
        $result =  $this->render('lucky/news.html.twig', ['number' => $aaa]);
        $this->addFlash('success', $aaa);

        return $result;
    }

    /**
     * @Route("/{aaa}/liturgy.html.twig", name="liturgy.html.twig")
     * @param $aaa
     * @return Response
     */
    public function liturgy($aaa)
    {
        $result =  $this->render(/** @lang text */ 'lucky/liturgy.html.twig', ['number' => $aaa]);
        $this->addFlash('success', $aaa);

        return $result;
    }

    /**
     * @Route("/{aaa}/contact.html.twig", name="contact.html.twig")
     * @param $aaa
     * @return Response
     */
    public function contact($aaa)
    {
        $result =  $this->render(/** @lang text */ 'lucky/contact.html.twig', ['number' => $aaa]);
        $this->addFlash('success', $aaa);

        return $result;
    }

}