<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setTitle('aaaaaaa');

        $article = new Article();
        $article
            ->setImage('my image')
            ->setContent('my content')
            ->setTitle('my title')
            ->setCategories($category)
        ;

         $manager->persist($article);
         $manager->persist($category);

        $manager->flush();
    }
}
