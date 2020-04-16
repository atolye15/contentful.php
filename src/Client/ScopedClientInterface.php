<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

interface ScopedClientInterface
{
    /**
     * Returns a string representation of the API currently in use.
     */
    public function getApi(): string;

    /**
     * Returns the ID of the space currently in use.
     */
    public function getSpaceId(): string;

    /**
     * Returns the ID of the environment currently in use.
     */
    public function getEnvironmentId(): string;

    /**
     * Returns the user defined cache key prefix.
     */
    public function getCacheKeyPrefix(): string;
}
