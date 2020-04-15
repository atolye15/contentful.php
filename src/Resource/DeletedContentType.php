<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Resource;

use Atolye15\Delivery\SystemProperties\DeletedContentType as SystemProperties;

/**
 * A DeletedContentType describes a content type that has been deleted.
 */
class DeletedContentType extends DeletedResource
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
}
