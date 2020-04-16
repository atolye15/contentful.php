<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

use Contentful\Core\Api\Link;
use Contentful\Core\Exception\NotFoundException;
use Contentful\Core\Resource\ResourceArray;
use Contentful\Core\Resource\ResourceInterface;
use Atolye15\Delivery\Query;
use Atolye15\Delivery\Resource\Asset;
use Atolye15\Delivery\Resource\ContentType;
use Atolye15\Delivery\Resource\Entry;
use Atolye15\Delivery\Resource\Environment;
use Atolye15\Delivery\Resource\Space;

/**
 * ClientInterface.
 *
 * This interface should be used whenever referring to a client object instance,
 * as it decouples the method signatures from the actual implementation.
 *
 * It provides definitions for all methods which return API resources.
 */
interface ClientInterface extends ScopedClientInterface
{
    /**
     * Returns a single Asset object corresponding to the given ID.
     *
     * @param string      $assetId
     * @param string|null $locale
     *
     * @throws NotFoundException If no asset is found with the given ID
     *
     * @return Asset
     */
    public function getAsset(string $assetId, string $locale = \null): Asset;

    /**
     * Returns a collection of Asset objects wrapped in a ResourceArray instance.
     *
     * @param Query|null $query
     *
     * @return ResourceArray|Asset[]
     */
    public function getAssets(Query $query = \null): ResourceArray;

    /**
     * Returns a single ContentType object corresponding to the given ID.
     *
     * @param string $contentTypeId
     *
     * @throws NotFoundException If no content type is found with the given ID
     *
     * @return ContentType
     */
    public function getContentType(string $contentTypeId): ContentType;

    /**
     * Returns a collection of ContentType objects wrapped in a ResourceArray instance.
     *
     * @param Query|null $query
     *
     * @return ResourceArray|ContentType[]
     */
    public function getContentTypes(Query $query = \null): ResourceArray;

    /**
     * Returns the Environment object corresponding to the one in use.
     *
     * @return Environment
     */
    public function getEnvironment(): Environment;

    /**
     * Returns a single Entry object corresponding to the given ID.
     *
     * @param string      $entryId
     * @param string|null $locale
     *
     * @throws NotFoundException If no entry is found with the given ID
     *
     * @return Entry
     */
    public function getEntry(string $entryId, string $locale = \null): Entry;

    /**
     * Returns a collection of Entry objects wrapped in a ResourceArray instance.
     *
     * @param Query|null $query
     *
     * @return ResourceArray|Entry[]
     */
    public function getEntries(Query $query = \null): ResourceArray;

    /**
     * Returns the Space object corresponding to the one in use.
     *
     * @return Space
     */
    public function getSpace(): Space;

    /**
     * Resolve a link to its actual resource.
     *
     * @param Link   $link
     * @param string $locale
     *
     * @throws \InvalidArgumentException when encountering an unexpected link type
     *
     * @return ResourceInterface
     */
    public function resolveLink(Link $link, string $locale = \null): ResourceInterface;

    /**
     * Resolves an array of links.
     * A method implementing this may apply some optimizations
     * to reduce the amount of necessary API calls.
     *
     * @param Link[]      $links
     * @param string|null $locale
     *
     * @return ResourceInterface[]
     */
    public function resolveLinkCollection(array $links, string $locale = \null): array;
}
