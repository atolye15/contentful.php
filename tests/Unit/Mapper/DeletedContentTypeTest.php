<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Unit\Mapper;

use Atolye15\Delivery\Mapper\DeletedContentType as Mapper;
use Atolye15\Delivery\Resource\DeletedContentType;
use Atolye15\Tests\Delivery\Implementation\MockClient;
use Atolye15\Tests\Delivery\Implementation\MockEnvironment;
use Atolye15\Tests\Delivery\Implementation\MockParser;
use Atolye15\Tests\Delivery\Implementation\MockResourceBuilder;
use Atolye15\Tests\Delivery\Implementation\MockSpace;
use Atolye15\Tests\Delivery\TestCase;

class DeletedContentTypeTest extends TestCase
{
    public function testMapper()
    {
        $mapper = new Mapper(
            new MockResourceBuilder(),
            new MockClient(),
            new MockParser()
        );

        $space = MockSpace::withSys('spaceId');
        $environment = MockEnvironment::withSys('environmentId');

        /** @var DeletedContentType $resource */
        $resource = $mapper->map(null, [
            'sys' => [
                'id' => 'deletedContentTypeId',
                'type' => 'DeletedContentType',
                'space' => $space,
                'environment' => $environment,
                'revision' => 1,
                'createdAt' => '2016-01-01T12:00:00.123Z',
                'updatedAt' => '2017-01-01T12:00:00.123Z',
                'deletedAt' => '2018-01-01T12:00:00.123Z',
            ],
        ]);

        $this->assertInstanceOf(DeletedContentType::class, $resource);
        $this->assertSame('deletedContentTypeId', $resource->getId());
        $this->assertSame('DeletedContentType', $resource->getType());

        $sys = $resource->getSystemProperties();
        $this->assertSame($space, $sys->getSpace());
        $this->assertSame($environment, $sys->getEnvironment());
        $this->assertSame(1, $sys->getRevision());
        $this->assertSame('2016-01-01T12:00:00.123Z', (string) $sys->getCreatedAt());
        $this->assertSame('2017-01-01T12:00:00.123Z', (string) $sys->getUpdatedAt());
        $this->assertSame('2018-01-01T12:00:00.123Z', (string) $sys->getDeletedAt());
    }
}
