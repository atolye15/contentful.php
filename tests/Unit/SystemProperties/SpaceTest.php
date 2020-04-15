<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\SystemProperties;

use Atolye15\Delivery\SystemProperties\Space;
use Atolye15\Tests\Delivery\TestCase;

class SpaceTest extends TestCase
{
    public function testSys()
    {
        $sys = new Space([
            'id' => 'spaceId',
            'type' => 'Space',
        ]);

        $this->assertSame('spaceId', $sys->getId());
        $this->assertSame('Space', $sys->getType());

        $this->assertJsonFixtureEqualsJsonObject('serialize.json', $sys);
    }
}
