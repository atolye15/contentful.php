<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Unit\Mapper;

use Atolye15\Delivery\Mapper\Space as Mapper;
use Atolye15\Delivery\Resource\Space;
use Atolye15\Tests\Delivery\Implementation\MockClient;
use Atolye15\Tests\Delivery\Implementation\MockParser;
use Atolye15\Tests\Delivery\Implementation\MockResourceBuilder;
use Atolye15\Tests\Delivery\TestCase;

class SpaceTest extends TestCase
{
    public function testMapper()
    {
        $mapper = new Mapper(
            new MockResourceBuilder(),
            new MockClient(),
            new MockParser()
        );

        /** @var Space $resource */
        $resource = $mapper->map(null, [
            'sys' => [
                'id' => 'spaceId',
                'type' => 'Space',
            ],
            'name' => 'My special space',
        ]);

        $this->assertInstanceOf(Space::class, $resource);
        $this->assertSame('spaceId', $resource->getId());
        $this->assertSame('Space', $resource->getType());

        $this->assertSame('My special space', $resource->getName());
    }
}
