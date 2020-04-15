<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\ResourcePool;

use Atolye15\Delivery\ClientOptions;
use Atolye15\Delivery\ResourcePool\Extended;
use Atolye15\Delivery\ResourcePool\Factory;
use Atolye15\Delivery\ResourcePool\Standard;
use Atolye15\Tests\Delivery\Implementation\JsonDecoderClient;
use Atolye15\Tests\Delivery\TestCase;

class FactoryTest extends TestCase
{
    public function testCorrectObjectIsCreates()
    {
        $client = new JsonDecoderClient();

        $options = (new ClientOptions())
            ->withLowMemoryResourcePool()
        ;
        $this->assertInstanceOf(Standard::class, Factory::create($client, $options));

        $this->assertInstanceOf(Extended::class, Factory::create($client, new ClientOptions()));
    }
}
