<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\Resource;

use Atolye15\Tests\Delivery\Implementation\MockSpace;
use Atolye15\Tests\Delivery\TestCase;

class SpaceTest extends TestCase
{
    public function testGetter()
    {
        $space = MockSpace::withSys('cfexampleapi', ['name' => 'Space name']);

        $this->assertSame('cfexampleapi', $space->getId());
        $this->assertSame('Space name', $space->getName());
    }

    public function testJsonSerialize()
    {
        $space = MockSpace::withSys('cfexampleapi', ['name' => 'Space name']);

        $this->assertJsonFixtureEqualsJsonObject('serialize.json', $space);
    }
}
