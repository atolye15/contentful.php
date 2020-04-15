<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Contentful\RichText\Node\NodeInterface;
use Contentful\RichText\Node\Text;
use Contentful\RichText\ParserInterface;

class MockParser implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(array $data): NodeInterface
    {
        return new Text('Some text');
    }

    /**
     * {@inheritdoc}
     */
    public function parseCollection(array $data): array
    {
        return \array_map([$this, 'parse'], $data);
    }
}
