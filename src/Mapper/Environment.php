<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Atolye15\Delivery\Resource\Environment as ResourceClass;
use Atolye15\Delivery\Resource\Locale;
use Atolye15\Delivery\SystemProperties\Environment as SystemProperties;

/**
 * Environment class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Contentful\Delivery\Resource\Environment.
 */
class Environment extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        /** @var ResourceClass $environment */
        $environment = $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => $this->createSystemProperties(SystemProperties::class, $data),
            'locales' => \array_map(function (array $localeData): Locale {
                /** @var Locale $locale */
                $locale = $this->builder->build($localeData);

                return $locale;
            }, $data['locales']),
        ]);

        return $environment;
    }
}
