<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Integration;

use Atolye15\Delivery\ResourceBuilder;
use Contentful\RichText\Parser;
use Atolye15\Tests\Delivery\Implementation\LinkResolver;
use Atolye15\Tests\Delivery\Implementation\MockClient;
use Atolye15\Tests\Delivery\Implementation\MockResourcePool;
use Atolye15\Tests\Delivery\TestCase;

class InvalidBuilderTypeTest extends TestCase
{
    public function testExceptionOnInvalidSysType()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unexpected system type "invalidType" while trying to build a resource.');

        $builder = new ResourceBuilder(
            new MockClient(),
            new MockResourcePool(),
            new Parser(new LinkResolver())
        );

        $builder->build([
            'sys' => [
                'type' => 'invalidType',
                'id' => 'invalidId',
            ],
        ]);
    }
}
