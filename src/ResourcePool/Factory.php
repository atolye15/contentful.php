<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\ResourcePool;

use Atolye15\Core\Resource\ResourcePoolInterface;
use Atolye15\Delivery\Client\JsonDecoderClientInterface;
use Atolye15\Delivery\ClientOptions;

/**
 * Factory class.
 * This class handles the creation of resource pool objects.
 */
class Factory
{
    /**
     * Creates the appropriate ResourcePool object using the given client and options.
     */
    public static function create(JsonDecoderClientInterface $client, ClientOptions $options): ResourcePoolInterface
    {
        if ($options->usesLowMemoryResourcePool()) {
            return new Standard($client->getApi(), $client->getSpaceId(), $client->getEnvironmentId(), $client->getCacheItemPool());
        }

        return new Extended(
            $client,
            $options->getCacheItemPool(),
            $options->hasCacheAutoWarmup(),
            $options->hasCacheContent()
        );
    }
}
