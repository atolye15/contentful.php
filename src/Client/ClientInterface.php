<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

use Atolye15\Core\Api\Link;
use Atolye15\Core\Exception\NotFoundException;
use Atolye15\Core\Resource\ResourceArray;
use Atolye15\Core\Resource\ResourceInterface;
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
     * @throws NotFoundException If no asset is found with the given ID
     */
    public function getAsset(string $assetId, string $locale = null): Asset;

    /**
     * Returns a collection of Asset objects wrapped in a ResourceArray instance.
     *
     * @return ResourceArray|Asset[]
     */
    public function getAssets(Query $query = null): ResourceArray;

    /**
     * Returns a single ContentType object corresponding to the given ID.
     *
     * @throws NotFoundException If no content type is found with the given ID
     */
    public function getContentType(string $contentTypeId): ContentType;

    /**
     * Returns a collection of ContentType objects wrapped in a ResourceArray instance.
     *
     * @return ResourceArray|ContentType[]
     */
    public function getContentTypes(Query $query = null): ResourceArray;

    /**
     * Returns the Environment object corresponding to the one in use.
     */
    public function getEnvironment(): Environment;

    /**
     * Returns a single Entry object corresponding to the given ID.
     *
     * @throws NotFoundException If no entry is found with the given ID
     */
    public function getEntry(string $entryId, string $locale = null): Entry;

    /**
     * Returns a collection of Entry objects wrapped in a ResourceArray instance.
     *
     * @return ResourceArray|Entry[]
     */
    public function getEntries(Query $query = null): ResourceArray;

    /**
     * Returns the Space object corresponding to the one in use.
     */
    public function getSpace(): Space;

    /**
     * Resolve a link to its actual resource.
     *
     * @param string $locale
     *
     * @throws \InvalidArgumentException when encountering an unexpected link type
     */
    public function resolveLink(Link $link, string $locale = null): ResourceInterface;

    /**
     * Resolves an array of links.
     * A method implementing this may apply some optimizations
     * to reduce the amount of necessary API calls.
     *
     * @param Link[] $links
     *
     * @return ResourceInterface[]
     */
    public function resolveLinkCollection(array $links, string $locale = null): array;
}
