<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Unit;

use Atolye15\Core\Api\Link;
use Atolye15\Core\Resource\ResourceInterface;
use Atolye15\Delivery\LinkResolver;
use Atolye15\Delivery\Resource\Asset;
use Atolye15\Delivery\Resource\ContentType;
use Atolye15\Delivery\Resource\Entry;
use Atolye15\Delivery\Resource\Environment;
use Atolye15\Delivery\Resource\Space;
use Atolye15\Tests\Delivery\Implementation\MockClient;
use Atolye15\Tests\Delivery\Implementation\MockResourcePool;
use Atolye15\Tests\Delivery\TestCase;

class LinkResolverTest extends TestCase
{
    public function testLinksAreResolved()
    {
        $spaceId = \bin2hex(\random_bytes(5));
        $environmentId = \bin2hex(\random_bytes(5));
        $linkResolver = new LinkResolver(new MockClient($spaceId, $environmentId), new MockResourcePool());

        $resourceId = \bin2hex(\random_bytes(5));
        /** @var Asset $resource */
        $resource = $linkResolver->resolveLink(new Link($resourceId, 'Asset'), ['locale' => 'it-IT']);
        $this->assertInstanceOf(Asset::class, $resource);
        $this->assertSame($resourceId, $resource->getId());
        $this->assertSame('it-IT', $resource->getSystemProperties()->getLocale());

        $resourceId = \bin2hex(\random_bytes(5));
        /** @var ContentType $resource */
        $resource = $linkResolver->resolveLink(new Link($resourceId, 'ContentType'));
        $this->assertInstanceOf(ContentType::class, $resource);
        $this->assertSame($resourceId, $resource->getId());

        /** @var Environment $resource */
        $resource = $linkResolver->resolveLink(new Link('irrelevant', 'Environment'));
        $this->assertInstanceOf(Environment::class, $resource);
        $this->assertSame($environmentId, $resource->getId());

        $resourceId = \bin2hex(\random_bytes(5));
        /** @var Entry $resource */
        $resource = $linkResolver->resolveLink(new Link($resourceId, 'Entry'), ['locale' => 'it-IT']);
        $this->assertInstanceOf(Entry::class, $resource);
        $this->assertSame($resourceId, $resource->getId());
        $this->assertSame('it-IT', $resource->getSystemProperties()->getLocale());

        /** @var Space $resource */
        $resource = $linkResolver->resolveLink(new Link('irrelevant', 'Space'));
        $this->assertInstanceOf(Space::class, $resource);
        $this->assertSame($spaceId, $resource->getId());
    }

    public function testInvalidLink()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Trying to resolve link for unknown type "InvalidType".');

        $linkResolver = new LinkResolver(new MockClient(), new MockResourcePool());

        $linkResolver->resolveLink(new Link('irrelevant', 'InvalidType'));
    }

    public function testLinkCollectionIsResolved()
    {
        $linkResolver = new LinkResolver(new MockClient(), new MockResourcePool());

        $links = [
            new Link('spaceId', 'Space'),
            new Link('environmentId', 'Environment'),
            new Link('entryId', 'Entry'),
            new Link('contentTypeId', 'ContentType'),
            new Link('assetId', 'Asset'),
        ];

        $results = $linkResolver->resolveLinkCollection($links);

        $this->assertContainsOnlyInstancesOf(ResourceInterface::class, $results);

        $this->assertInstanceOf(Space::class, $results[0]);
        $this->assertInstanceOf(Environment::class, $results[1]);
        $this->assertInstanceOf(Entry::class, $results[2]);
        $this->assertInstanceOf(ContentType::class, $results[3]);
        $this->assertInstanceOf(Asset::class, $results[4]);
    }

    public function testInvalidLinkCollection()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Trying to resolve link for unknown type "InvalidType".');

        $linkResolver = new LinkResolver(new MockClient(), new MockResourcePool());

        $linkResolver->resolveLinkCollection([new Link('irrelevant', 'InvalidType')], []);
    }
}
