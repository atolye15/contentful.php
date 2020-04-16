<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties;

abstract class LocalizedResource extends BaseSystemProperties
{
    use Component\EditedTrait,
        Component\EnvironmentTrait,
        Component\LocaleTrait,
        Component\SpaceTrait;

    /**
     * LocalizedResource constructor.
     *
     * @param array $sys
     */
    public function __construct(array $sys)
    {
        parent::__construct($sys);

        $this->initEdited($sys);
        $this->initEnvironment($sys);
        $this->initLocale($sys);
        $this->initSpace($sys);
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return \array_filter(\array_merge(
            parent::jsonSerialize(),
            $this->jsonSerializeEdited(),
            $this->jsonSerializeEnvironment(),
            $this->jsonSerializeLocale(),
            $this->jsonSerializeSpace()
        ));
    }
}
