<?php
namespace App\Twig;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MathExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('round', function ($v) {
                return 'v= ' . round($v);
            }),
            new TwigFunction('almaz', function () {
                return 'Hello Almaz!';
            })
        ];
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('almazik', function ($v) {
                return 'almazik= ' . round($v);
            })
        ];
    }

}
