<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Core\Api\Link;
use Atolye15\Core\Api\LinkResolverInterface;
use Atolye15\Core\Resource\ResourceInterface;

class LinkResolver implements LinkResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function resolveLink(Link $link, array $parameters = []): ResourceInterface
    {
        return MockEntry::withSys();
    }

    /**
     * {@inheritdoc}
     */
    public function resolveLinkCollection(array $links, array $parameters = []): array
    {
        return \array_map(function (Link $link) use ($parameters): ResourceInterface {
            return $this->resolveLink($link, $parameters);
        }, $links);
    }
}
