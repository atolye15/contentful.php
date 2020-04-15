<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Atolye15\Core\Resource\ResourceArray as ResourceClass;

/**
 * ResourceArray class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Contentful\Core\Resource\ResourceArray.
 */
class ResourceArray extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        return new ResourceClass(
            \array_map(function ($item) {
                return $this->builder->build($item);
            }, $data['items']),
            $data['total'],
            $data['limit'],
            $data['skip']
        );
    }
}
