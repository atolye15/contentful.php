<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Resource;

use Atolye15\Delivery\SystemProperties\Locale as SystemProperties;

/**
 * Value object encoding a locale.
 */
class Locale extends BaseResource
{
    /**
     * @var SystemProperties
     */
    protected $sys;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $fallbackCode;

    /**
     * @var bool
     */
    protected $default = \false;

    /**
     * {@inheritdoc}
     */
    public function getSystemProperties(): SystemProperties
    {
        return $this->sys;
    }

    /**
     * Returns the locale code.
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Returns the human readable name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns true if this is the default locale for the space.
     *
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * Returns the code of the locale used for for the fallback.
     *
     * @return string|null
     */
    public function getFallbackCode()
    {
        return $this->fallbackCode;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        $locale = [
            'sys' => $this->sys,
            'code' => $this->code,
            'default' => $this->default,
            'name' => $this->name,
            'fallbackCode' => $this->fallbackCode,
        ];

        return $locale;
    }
}
