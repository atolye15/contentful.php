<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Cache;

use Contentful\Core\Resource\SystemPropertiesInterface;
use Atolye15\Delivery\SystemProperties\LocalizedResource as LocalizedResourceSystemProperties;
use function GuzzleHttp\json_encode as guzzle_json_encode;

/**
 * CacheWarmer class.
 *
 * Use this class to save the needed cache information in a
 * PSR-6 compatible pool.
 */
class CacheWarmer extends BaseCacheHandler
{
    /**
     * @param bool $cacheContent
     *
     * @return bool
     */
    public function warmUp($cacheContent = \false): bool
    {
        foreach ($this->fetchResources($cacheContent) as $resource) {
            /** @var SystemPropertiesInterface $sys */
            $sys = $resource->getSystemProperties();

            $options = $sys instanceof LocalizedResourceSystemProperties
                ? ['locale' => $sys->getLocale()]
                : [];
            $key = $this->resourcePool->generateKey($sys->getType(), $sys->getId(), $options);

            $item = $this->cacheItemPool->getItem($key);
            $item->set(guzzle_json_encode($resource));

            $this->cacheItemPool->saveDeferred($item);
        }

        return $this->cacheItemPool->commit();
    }
}
