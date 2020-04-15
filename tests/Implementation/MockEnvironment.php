<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Resource\Environment;
use Atolye15\Delivery\SystemProperties\Environment as SystemProperties;

class MockEnvironment extends Environment
{
    /**
     * MockEnvironment constructor.
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return MockEnvironment
     */
    public static function withSys(string $id = 'environmentId', array $data = []): self
    {
        return new static(\array_merge($data, [
            'sys' => new SystemProperties([
                'id' => $id,
                'type' => 'Environment',
            ]),
        ]));
    }
}
