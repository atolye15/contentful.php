<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
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

    /**
     * @param array $data
     */
    protected function initContentType(array $data)
    {
        $this->contentType = $data['contentType'];
    }

    /**
     * @return array
     */
    protected function jsonSerializeContentType(): array
    {
        return [
            'contentType' => $this->contentType->asLink(),
        ];
    }

    /**
     * @return ContentType
     */
    public function getContentType(): ContentType
    {
        return $this->contentType;
    }
}
