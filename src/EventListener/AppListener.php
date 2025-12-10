<?php

namespace App\EventListener;

use App\Entity\Activity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AppListener
{
    public function __construct(protected Security $security, protected EntityManagerInterface $em)
    {
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if ($event->isMainRequest() === false) {
            return;
        }

        $request = $event->getRequest();

        $activity = new Activity();
        $activity->setUrl($request->getRequestUri());
        $activity->setAgent($request->headers->get('User-Agent'));
        $activity->setIpAddr($request->getClientIp());
        $activity->setQuery(json_encode($request->query->all()));
        $activity->setUserId($this->security->getUser()?->getId());

        $this->em->persist($activity);
        $this->em->flush();
    }
}
