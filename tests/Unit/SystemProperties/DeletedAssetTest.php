<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\SystemProperties;

use Atolye15\Delivery\SystemProperties\DeletedAsset;
use Atolye15\Tests\Delivery\Implementation\MockEnvironment;
use Atolye15\Tests\Delivery\Implementation\MockSpace;
use Atolye15\Tests\Delivery\TestCase;

class DeletedAssetTest extends TestCase
{
    public function testSys()
    {
        $sys = new DeletedAsset([
            'id' => 'assetId',
            'type' => 'DeletedAsset',
            'revision' => 1,
            'locale' => 'en-US',
            'space' => MockSpace::withSys('spaceId'),
            'environment' => MockEnvironment::withSys('environmentId'),
            'createdAt' => '2018-01-01T12:00:00.123Z',
            'updatedAt' => '2018-01-01T12:00:00.123Z',
            'deletedAt' => '2018-01-01T12:00:00.123Z',
        ]);

        $this->assertSame('assetId', $sys->getId());
        $this->assertSame('DeletedAsset', $sys->getType());
        $this->assertSame(1, $sys->getRevision());
        $this->assertSame('en-US', $sys->getLocale());
        $this->assertSame('spaceId', $sys->getSpace()->getId());
        $this->assertSame('environmentId', $sys->getEnvironment()->getId());
        $this->assertSame('2018-01-01T12:00:00.123Z', (string) $sys->getCreatedAt());
        $this->assertSame('2018-01-01T12:00:00.123Z', (string) $sys->getUpdatedAt());
        $this->assertSame('2018-01-01T12:00:00.123Z', (string) $sys->getDeletedAt());

        $this->assertJsonFixtureEqualsJsonObject('serialize.json', $sys);
    }
}
