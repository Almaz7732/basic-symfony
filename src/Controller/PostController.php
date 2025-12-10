<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
//    #[Route('/post')]
//    public function index(): Response
//    {
//        return $this->render('post/index.html.twig');
//    }

    #[Route('/post/show/{id}', name: 'post_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $post = $em->getRepository(Post::class)->find($id);
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
