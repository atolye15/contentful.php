<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Resource;

use Atolye15\Delivery\SystemProperties\DeletedEntry as SystemProperties;

/**
 * A DeletedEntry describes an entry that has been deleted.
 */
class DeletedEntry extends DeletedResource
{
    /**
     * @var SystemProperties
     */
    protected $sys;

    /**
     * {@inheritdoc}
     */
    public function getSystemProperties(): SystemProperties
    {
        return $this->sys;
    }

    /**
     * This method always returns null when used with the sync API.
     * It does return a value when parsing a webhook response.
     *
     * @return ContentType
     */
    public function getContentType(): ContentType
    {
        return $this->sys->getContentType();
    }
}
