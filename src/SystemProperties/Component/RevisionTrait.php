<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties\Component;

trait RevisionTrait
{
    /**
     * @var int
     */
    protected $revision;

    /**
     * @param array $data
     */
    protected function initRevision(array $data)
    {
        $this->revision = $data['revision'] ?? $data['version'] ?? 1;
    }

    /**
     * @return array
     */
    protected function jsonSerializeRevision(string $name = 'revision'): array
    {
        return [
            $name => $this->revision,
        ];
    }

    /**
     * @return int
     */
    public function getRevision(): int
    {
        return $this->revision;
    }
}
