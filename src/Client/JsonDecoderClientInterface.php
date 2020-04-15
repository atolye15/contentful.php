<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Client;

use Atolye15\Core\Resource\ResourceArray;
use Atolye15\Core\Resource\ResourceInterface;

interface JsonDecoderClientInterface extends ScopedClientInterface
{
    /**
     * Parse a JSON string.
     *
     * @throws \InvalidArgumentException When attempting to parse JSON belonging to a different space or environment
     *
     * @return ResourceInterface|ResourceArray
     */
    public function parseJson(string $json);
}
