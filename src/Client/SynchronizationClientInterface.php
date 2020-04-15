<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

use Atolye15\Delivery\Synchronization\Manager;

interface SynchronizationClientInterface
{
    /**
     * Get an instance of the synchronization manager.
     * Note that with the Preview API only an initial sync gives valid results.
     *
     * @see https://www.contentful.com/developers/docs/concepts/sync/ Sync API
     */
    public function getSynchronizationManager(): Manager;

    /**
     * Internal method for the sync manager.
     */
    public function syncRequest(array $queryData): array;
}
