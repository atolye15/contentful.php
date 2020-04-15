<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Resource\Space;
use Atolye15\Delivery\SystemProperties\Space as SystemProperties;

class MockSpace extends Space
{
    /**
     * MockSpace constructor.
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return MockSpace
     */
    public static function withSys(string $id = 'spaceId', array $data = []): self
    {
        return new static(\array_merge($data, [
            'sys' => new SystemProperties([
                'id' => $id,
                'type' => 'Space',
            ]),
        ]));
    }
}
