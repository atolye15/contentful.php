<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Delivery\Console;

use Atolye15\Delivery\Cache\CacheClearer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCacheCommand extends BaseCacheCommand
{
    /**
     * {@inheritdoc}
     */
    protected function getCommandName(): string
    {
        return 'delivery:cache:clear';
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->initClient($input);
        $cacheContent = (bool) $input->getOption('cache-content');

        $warmer = new CacheClearer($this->client, $this->resourcePool, $this->cacheItemPool);
        if (!$warmer->clear($cacheContent)) {
            throw new \RuntimeException(\sprintf('The SDK could not clear the cache. Try checking your PSR-6 implementation (class "%s").', \get_class($this->cacheItemPool)));
        }

        $output->writeln(\sprintf(
            '<info>Cache cleared for space "%s" on environment "%s" using API "%s".</info>',
            $this->client->getSpaceId(),
            $this->client->getEnvironmentId(),
            $this->client->getApi()
        ));
    }
}
