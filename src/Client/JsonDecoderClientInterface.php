<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

use Contentful\Core\Resource\ResourceArray;
use Contentful\Core\Resource\ResourceInterface;

interface JsonDecoderClientInterface extends ScopedClientInterface
{
    /**
     * Parse a JSON string.
     *
     * @param string $json
     *
     * @throws \InvalidArgumentException When attempting to parse JSON belonging to a different space or environment
     *
     * @return ResourceInterface|ResourceArray
     */
    public function parseJson(string $json);
}
