<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\SystemProperties\Component;

use Atolye15\Delivery\Resource\Environment;

trait EnvironmentTrait
{
    /**
     * @var Environment
     */
    protected $environment;

    protected function initEnvironment(array $data)
    {
        $this->environment = $data['environment'];
    }

    protected function jsonSerializeEnvironment(): array
    {
        return [
            'environment' => $this->environment->asLink(),
        ];
    }

    public function getEnvironment(): Environment
    {
        return $this->environment;
    }
}
