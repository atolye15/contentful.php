<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Atolye15\Delivery\Resource\Space as ResourceClass;
use Atolye15\Delivery\SystemProperties\Space as SystemProperties;

/**
 * Space class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Atolye15\Delivery\Resource\Space.
 */
class Space extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        /** @var ResourceClass $space */
        $space = $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => $this->createSystemProperties(SystemProperties::class, $data),
            'name' => $data['name'],
        ]);

        return $space;
    }
}
