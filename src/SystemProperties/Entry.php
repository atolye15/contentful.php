<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties;

class Entry extends LocalizedResource
{
    use Component\ContentTypeTrait;

    /**
     * Entry constructor.
     */
    public function __construct(array $sys)
    {
        parent::__construct($sys);

        $this->initContentType($sys);
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return \array_merge(
            parent::jsonSerialize(),
            $this->jsonSerializeContentType()
        );
    }
}
