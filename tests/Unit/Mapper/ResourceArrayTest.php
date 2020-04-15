<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Unit\Mapper;

use Atolye15\Core\Resource\ResourceArray;
use Atolye15\Delivery\Mapper\ResourceArray as Mapper;
use Atolye15\Delivery\Resource\Entry;
use Atolye15\Tests\Delivery\Implementation\MockClient;
use Atolye15\Tests\Delivery\Implementation\MockParser;
use Atolye15\Tests\Delivery\Implementation\MockResourceBuilder;
use Atolye15\Tests\Delivery\TestCase;

class ResourceArrayTest extends TestCase
{
    public function testMapper()
    {
        $mapper = new Mapper(
            new MockResourceBuilder(),
            new MockClient(),
            new MockParser()
        );

        /** @var ResourceArray $resource */
        $resource = $mapper->map(null, [
            'sys' => [
                'type' => 'Array',
            ],
            'items' => [
                [],
            ],
            'total' => 1000,
            'skip' => 50,
            'limit' => 100,
        ]);

        $this->assertInstanceOf(ResourceArray::class, $resource);
        $this->assertContainsOnlyInstancesOf(Entry::class, $resource->getItems());
        $this->assertCount(1, $resource->getItems());
        $this->assertSame(1000, $resource->getTotal());
        $this->assertSame(50, $resource->getSkip());
        $this->assertSame(100, $resource->getLimit());
    }
}
