<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Resource;

use Contentful\Core\Api\Link;
use Contentful\Core\Resource\ResourceInterface;

abstract class BaseResource implements ResourceInterface
{
    /**
     * Resources in this SDK should not be built using `$new Class()`.
     * This method is only useful in testing environments, where the resource
     * needs to be subclasses and this method made public.
     */
    protected function __construct(array $data)
    {
        foreach ($data as $property => $value) {
            if (\property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function asLink(): Link
    {
        return new Link(
            $this->getSystemProperties()->getId(),
            $this->getSystemProperties()->getType()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->getSystemProperties()->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return $this->getSystemProperties()->getType();
    }
}
