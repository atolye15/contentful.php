<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Core\Api\Link;
use Atolye15\Core\Resource\ResourceArray;
use Atolye15\Core\Resource\ResourceInterface;
use Atolye15\Delivery\Client\ClientInterface;
use Atolye15\Delivery\Query;
use Atolye15\Delivery\Resource\Asset;
use Atolye15\Delivery\Resource\ContentType;
use Atolye15\Delivery\Resource\Entry;
use Atolye15\Delivery\Resource\Environment;
use Atolye15\Delivery\Resource\Space;

class MockClient implements ClientInterface
{
    /**
     * @var Query|null
     */
    private $lastQuery;

    /**
     * @var string
     */
    private $spaceId;

    /**
     * @var string
     */
    private $environmentId;

    /**
     * @var string
     */
    private $cacheKeyPrefix;

    /**
     * MockClient constructor.
     */
    public function __construct(string $spaceId = 'spaceId', string $environmentId = 'environmentId', string $cacheKeyPrefix = 'cacheKeyPrefix')
    {
        $this->spaceId = $spaceId;
        $this->environmentId = $environmentId;
        $this->cacheKeyPrefix = $cacheKeyPrefix;
    }

    /**
     * {@inheritdoc}
     */
    public function getAsset(string $assetId, string $locale = null): Asset
    {
        return MockAsset::withSys($assetId, [], $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function getAssets(Query $query = null): ResourceArray
    {
        $this->lastQuery = $query;

        return new ResourceArray(
            [MockAsset::withSys('assetId')],
            1,
            100,
            0
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType(string $contentTypeId): ContentType
    {
        return MockContentType::withSys($contentTypeId);
    }

    /**
     * {@inheritdoc}
     */
    public function getContentTypes(Query $query = null): ResourceArray
    {
        $this->lastQuery = $query;

        return new ResourceArray(
            [MockContentType::withSys('contentTypeId')],
            1,
            100,
            0
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getEnvironment(): Environment
    {
        return MockEnvironment::withSys($this->environmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntry(string $entryId, string $locale = null): Entry
    {
        return MockEntry::withSys($entryId, [], $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntries(Query $query = null): ResourceArray
    {
        $this->lastQuery = $query;

        return new ResourceArray(
            [MockEntry::withSys('entryId')],
            1,
            100,
            0
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getSpace(): Space
    {
        return MockSpace::withSys($this->spaceId);
    }

    /**
     * {@inheritdoc}
     */
    public function resolveLink(Link $link, string $locale = null): ResourceInterface
    {
        return MockEntry::withSys($link->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function resolveLinkCollection(array $links, string $locale = null): array
    {
        return \array_map(function (Link $link): Entry {
            return MockEntry::withSys($link->getId());
        }, $links);
    }

    /**
     * {@inheritdoc}
     */
    public function getApi(): string
    {
        return 'DELIVERY';
    }

    /**
     * {@inheritdoc}
     */
    public function getSpaceId(): string
    {
        return $this->spaceId;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnvironmentId(): string
    {
        return $this->environmentId;
    }

    /**
     * @return Query|null
     */
    public function getLastQuery()
    {
        return $this->lastQuery;
    }

    /**
     * @inheritDoc
     */
    public function getCacheKeyPrefix(): string
    {
        return $this->cacheKeyPrefix;
    }
}
