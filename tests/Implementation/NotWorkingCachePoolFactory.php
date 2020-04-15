<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Cache\CacheItemPoolFactoryInterface;
use Psr\Cache\CacheItemPoolInterface;

class NotWorkingCachePoolFactory implements CacheItemPoolFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCacheItemPool(string $api, string $spaceId, string $environmentId): CacheItemPoolInterface
    {
        return new NotWorkingCachePool();
    }
}
