<?php
namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky')]
    public function number(): Response
    {
        $number = rand(0, 100);
        $list = [1,2,3,4,5,6,7];
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            'list' => $list
        ]);
    }

    public function test()
    {
        return $this->render('lucky/test.html.twig');
    }
}
