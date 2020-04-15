<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Resource\DeletedEntry;

class MockDeletedEntry extends DeletedEntry
{
    /**
     * MockDeletedEntry constructor.
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
