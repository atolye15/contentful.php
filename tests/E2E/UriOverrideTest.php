<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\E2E;

use Atolye15\Delivery\Client;
use Atolye15\Delivery\ClientOptions;
use Atolye15\Tests\Delivery\TestCase;

class UriOverrideTest extends TestCase
{
    /**
     * @vcr uri_override_without_trailing_slash.json
     */
    public function testWithoutTrailingSlash()
    {
        $this->skipIfApiCoverage();

        $options = ClientOptions::create()
            ->withHost('https://preview.contentful.com')
        ;
        $client = new Client('e5e8d4c5c122cf28fc1af3ff77d28bef78a3952957f15067bbc29f2f0dde0b50', 'cfexampleapi', 'master', $options);
        $space = $client->getSpace();

        $this->assertSame('Contentful Example API', $space->getName());
    }

    /**
     * @vcr uri_override_with_trailing_slash.json
     */
    public function testWithTrailingSlash()
    {
        $this->skipIfApiCoverage();

        $options = ClientOptions::create()
            ->withHost('https://preview.contentful.com/')
        ;
        $client = new Client('e5e8d4c5c122cf28fc1af3ff77d28bef78a3952957f15067bbc29f2f0dde0b50', 'cfexampleapi', 'master', $options);
        $space = $client->getSpace();

        $this->assertSame('Contentful Example API', $space->getName());
    }
}
