<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties\Component;

use Atolye15\Delivery\Resource\ContentType;

trait ContentTypeTrait
{
    /**
     * @var ContentType
     */
    protected $contentType;

    protected function initContentType(array $data)
    {
        $this->contentType = $data['contentType'];
    }

    protected function jsonSerializeContentType(): array
    {
        return [
            'contentType' => $this->contentType->asLink(),
        ];
    }

    public function getContentType(): ContentType
    {
        return $this->contentType;
    }
}
