<?php

declare(strict_types=1);

namespace Blog\Presentation\ValueResolver;

use Blog\Infrastructure\Entity\Admin;
use Blog\Infrastructure\Admin\AdminManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

final readonly class AdminValueResolver implements ValueResolverInterface
{
    public function __construct(
        private AdminManager $adminManager
    ) {}

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if ($argument->getType() !== Admin::class) {
            return [];
        }

        $uuid = $request->attributes->get('uuid');

        if (!$uuid) {
            return [];
        }

        $admin = $this->adminManager->getByUuid((string) $uuid);

        if (!$admin) {
            return [];
        }

        yield $admin;
    }
}
