<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\ResourcePool;

use Atolye15\Delivery\ResourcePool\Standard;
use Atolye15\Tests\Delivery\Implementation\MockContentType;
use Atolye15\Tests\Delivery\Implementation\MockEntry;
use Atolye15\Tests\Delivery\TestCase;

class StandardTest extends TestCase
{
    public function testGetSetData()
    {
        $resourcePool = new Standard('DELIVERY', 'cfexampleapi', 'master');

        $this->assertFalse($resourcePool->has('Entry', 'entryId', ['locale' => 'en-US']));
        $entry = MockEntry::withSys('entryId', [], 'en-US');
        $this->assertFalse($resourcePool->save($entry));

        $contentType = MockContentType::withSys('contentTypeId');
        $this->assertTrue($resourcePool->save($contentType));
        $this->assertTrue($resourcePool->has('ContentType', 'contentTypeId'));
        $this->assertSame($contentType, $resourcePool->get('ContentType', 'contentTypeId'));
    }
}
