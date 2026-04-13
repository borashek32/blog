<?php

declare(strict_types=1);

namespace Blog\Domain\Admin;

interface Admin
{
    public function getUuid(): ?string;

    public function getEmail(): ?string;

    public function getPassword(): ?string;
}
