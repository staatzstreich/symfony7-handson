<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\MicroPostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2024/06/12'],
        ['message' => 'Hi', 'created' => '2024/04/12'],
        ['message' => 'Bye!', 'created' => '2021/05/12']
    ];

    #[Route('/', name: 'app_index')]
    public function index(EntityManagerInterface $manager): Response
    {
        // $user = new User();
        // $user->setEmail('email@example.com');
        // $user->setPassword('123456');

        // $profile = new UserProfile();
        // $profile->setUser($user);

        // $manager->persist($profile);
        // $manager->flush();

        // $profile = $manager->find(UserProfile::class, 1);
        // $manager->remove($profile);
        // $manager->flush();

        // $post = new MicroPost();
        // $post->setTitle('Hello');
        // $post->setText('Hello');
        // $post->setCreated(new \DateTime());

        // $post = $manager->find(MicroPost::class, 8);

        // $comment = new Comment();
        // $comment->setText('Hello');
        // $comment->setPost($post);

        // $post->addComment($comment);
        // $manager->persist($post);
        // $manager->persist($comment);
        // $manager->flush();

        return $this->render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => 3,
            ]
        );
    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne(int $id=0): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );
    }
}
