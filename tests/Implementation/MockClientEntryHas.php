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
use Atolye15\Core\Resource\ResourceInterface;

class MockClientEntryHas extends MockClient
{
    /**
     * @var string[]
     */
    private $availableLinks;

    /**
     * MockClient constructor.
     *
     * @param string[] $availableLinks
     */
    public function __construct(array $availableLinks, string $spaceId = 'spaceId', string $environmentId = 'environmentId')
    {
        $this->availableLinks = $availableLinks;
        parent::__construct($spaceId, $environmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function resolveLink(Link $link, string $locale = null): ResourceInterface
    {
        $id = $link->getId();
        if (\in_array($id, $this->availableLinks, true)) {
            return 'Entry' === $link->getLinkType()
                ? MockEntry::withSys($id)
                : MockAsset::withSys($id);
        }

        throw new \Exception();
    }
}
