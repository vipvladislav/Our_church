<?php

namespace App\Factory;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Article|Proxy findOrCreate(array $attributes)
 * @method static Article|Proxy random()
 * @method static Article[]|Proxy[] randomSet(int $number)
 * @method static Article[]|Proxy[] randomRange(int $min, int $max)
 * @method static ArticleRepository|RepositoryProxy repository()
 * @method Article|Proxy create($attributes = [])
 * @method Article[]|Proxy[] createMany(int $number, $attributes = [])
 */
final class ArticleFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'title'=> self::faker()->name,
//            'content' => self::faker()->realText(80),
            'content' => self::faker()->paragraphs(
                self::faker()->numberBetween(1, 4),
                true
            ),
            'image' => self::faker()->domainName,

        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Article $article) {})
        ;
    }

    protected static function getClass(): string
    {
        return Article::class;
    }
}
