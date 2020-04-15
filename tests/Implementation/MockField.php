<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Implementation;

use Atolye15\Delivery\Resource\ContentType\Field;

class MockField extends Field
{
    /**
     * MockField constructor.
     */
    public function __construct(string $id, string $name, string $type, array $data = [])
    {
        parent::__construct($id, $name, $type);

        foreach ($data as $property => $value) {
            if (\property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }
}
