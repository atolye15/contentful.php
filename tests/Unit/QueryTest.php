<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit;

use Atolye15\Delivery\Query;
use Atolye15\Tests\Delivery\TestCase;

class QueryTest extends TestCase
{
    public function testQueryStringInclude()
    {
        $query = new Query();
        $query->setInclude(50);

        $this->assertSame('include=50', $query->getQueryString());
    }

    public function testQueryStringLocale()
    {
        $query = new Query();
        $query->setLocale('de-DE');

        $this->assertSame('locale=de-DE', $query->getQueryString());
    }
}
