<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Atolye15\Delivery\Resource\DeletedContentType as ResourceClass;
use Atolye15\Delivery\SystemProperties\DeletedContentType as SystemProperties;

/**
 * DeletedContentType class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Contentful\Delivery\Resource\DeletedContentType.
 */
class DeletedContentType extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        /** @var ResourceClass $deletedContentType */
        $deletedContentType = $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => $this->createSystemProperties(SystemProperties::class, $data),
        ]);

        return $deletedContentType;
    }
}
