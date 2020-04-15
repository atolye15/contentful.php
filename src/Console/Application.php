<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Console;

use Symfony\Component\Console\Application as AbstractApplication;

/**
 * CLI Application with Helpers for the Contentful SDK.
 */
class Application extends AbstractApplication
{
    public function __construct()
    {
        parent::__construct('contentful');
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultCommands(): array
    {
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new WarmUpCacheCommand();
        $defaultCommands[] = new ClearCacheCommand();

        return $defaultCommands;
    }
}
