<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties\Component;

use Atolye15\Core\Api\DateTimeImmutable;

trait DeletedTrait
{
    /**
     * @var DateTimeImmutable
     */
    protected $deletedAt;

    protected function initDeletedAt(array $data)
    {
        $this->deletedAt = new DateTimeImmutable($data['deletedAt']);
    }

    protected function jsonSerializeDeletedAt(): array
    {
        return [
            'deletedAt' => $this->deletedAt,
        ];
    }

    public function getDeletedAt(): DateTimeImmutable
    {
        return $this->deletedAt;
    }
}
