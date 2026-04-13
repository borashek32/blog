<?php

declare(strict_types=1);

namespace Blog\Infrastructure\Admin;

use Blog\Domain\Admin\Admin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

final readonly class AdminManager
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function getByUuid(string $uuid): ?Admin
    {
        return $this->em->getRepository(Admin::class)->find(Uuid::fromString($uuid));
    }

    public function getByEmail(string $email): ?Admin
    {
        return $this->em->getRepository(Admin::class)->findOneBy(['email' => $email]);
    }
}
