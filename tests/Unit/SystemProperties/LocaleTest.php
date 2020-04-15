<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\SystemProperties;

use Atolye15\Delivery\SystemProperties\Locale;
use Atolye15\Tests\Delivery\TestCase;

class LocaleTest extends TestCase
{
    public function testSys()
    {
        $sys = new Locale([
            'id' => 'localeId',
            'type' => 'Locale',
            'version' => 1,
        ]);

        $this->assertSame('localeId', $sys->getId());
        $this->assertSame('Locale', $sys->getType());
        $this->assertSame(1, $sys->getRevision());

        $this->assertJsonFixtureEqualsJsonObject('serialize.json', $sys);
    }
}
