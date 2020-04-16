<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Mapper;

use Contentful\Core\ResourceBuilder\ResourceBuilderInterface;
use Atolye15\Delivery\Client\ClientInterface;
use Atolye15\Delivery\Resource\ContentType as ContentTypeClass;
use Atolye15\Delivery\Resource\DeletedEntry as ResourceClass;
use Atolye15\Delivery\SystemProperties\ContentType as ContentTypeSystemProperties;
use Atolye15\Delivery\SystemProperties\DeletedEntry as SystemProperties;
use Contentful\RichText\ParserInterface;

/**
 * DeletedEntry class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Atolye15\Delivery\Resource\DeletedEntry.
 */
class DeletedEntry extends BaseMapper
{
    /**
     * @var ContentTypeClass
     */
    private $contentType;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        ResourceBuilderInterface $builder,
        ClientInterface $client,
        ParserInterface $richTextParser
    ) {
        parent::__construct($builder, $client, $richTextParser);

        /** @var ContentTypeClass $contentType */
        $contentType = $this->hydrator->hydrate(ContentTypeClass::class, [
            'sys' => $this->createSystemProperties(ContentTypeSystemProperties::class, [
                'sys' => [
                    'id' => '__DeletedEntryContentType',
                    'type' => 'ContentType',
                    'revision' => 1,
                    'createdAt' => '2015-01-01T12:00:00Z',
                    'updatedAt' => '2015-01-01T12:00:00Z',
                    'environment' => $client->getEnvironment(),
                    'space' => $client->getSpace(),
                ],
            ]),
            'name' => 'Deleted Entry',
        ]);
        $this->contentType = $contentType;
    }

    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        if (!isset($data['sys']['contentType'])) {
            $data['sys']['contentType'] = $this->contentType;
        }

        /** @var ResourceClass $deletedEntry */
        $deletedEntry = $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => $this->createSystemProperties(SystemProperties::class, $data),
        ]);

        return $deletedEntry;
    }
}
