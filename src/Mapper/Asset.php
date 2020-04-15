<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Atolye15\Core\Api\Link;
use Atolye15\Core\File\File;
use Atolye15\Core\File\FileInterface;
use Atolye15\Core\File\ImageFile;
use Atolye15\Core\File\LocalUploadFile;
use Atolye15\Core\File\RemoteUploadFile;
use Atolye15\Delivery\Resource\Asset as ResourceClass;
use Atolye15\Delivery\SystemProperties\Asset as SystemProperties;

/**
 * Asset class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Contentful\Delivery\Resource\Asset.
 */
class Asset extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        /** @var SystemProperties $sys */
        $sys = $this->createSystemProperties(SystemProperties::class, $data);
        $locale = $sys->getLocale();

        /** @var ResourceClass $asset */
        $asset = $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => $sys,
            'title' => isset($data['fields']['title'])
                ? $this->normalizeFieldData($data['fields']['title'], $locale)
                : null,
            'description' => isset($data['fields']['description'])
                ? $this->normalizeFieldData($data['fields']['description'], $locale)
                : null,
            'file' => isset($data['fields']['file'])
                ? \array_map([$this, 'buildFile'], $this->normalizeFieldData($data['fields']['file'], $locale))
                : null,
        ]);

        $asset->initLocales($asset->getSystemProperties()->getEnvironment()->getLocales());

        return $asset;
    }

    /**
     * Creates a File or a subclass thereof.
     */
    protected function buildFile(array $data): FileInterface
    {
        if (isset($data['uploadFrom'])) {
            return new LocalUploadFile(
                $data['fileName'],
                $data['contentType'],
                new Link(
                    $data['uploadFrom']['sys']['id'],
                    $data['uploadFrom']['sys']['linkType']
                )
            );
        }

        if (isset($data['upload'])) {
            return new RemoteUploadFile(
                $data['fileName'],
                $data['contentType'],
                $data['upload']
            );
        }

        if (isset($data['details']['image'])) {
            return new ImageFile(
                $data['fileName'],
                $data['contentType'],
                $data['url'],
                $data['details']['size'],
                $data['details']['image']['width'],
                $data['details']['image']['height']
            );
        }

        return new File(
            $data['fileName'],
            $data['contentType'],
            $data['url'],
            $data['details']['size']
        );
    }
}
