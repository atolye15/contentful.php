<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Resource\Asset;
use Atolye15\Delivery\SystemProperties\Asset as SystemProperties;

class MockAsset extends Asset
{
    /**
     * MockAsset constructor.
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return MockAsset
     */
    public static function withSys(string $id = 'assetId', array $data = [], string $locale = null): self
    {
        return new static(\array_merge($data, [
            'sys' => new SystemProperties([
                'id' => $id,
                'type' => 'Asset',
                'space' => MockSpace::withSys('spaceId'),
                'environment' => MockEnvironment::withSys('environmentId'),
                'revision' => 1,
                'createdAt' => '2010-01-01T12:00:00.123Z',
                'updatedAt' => '2010-01-01T12:00:00.123Z',
                'locale' => $locale,
            ]),
        ]));
    }
}
