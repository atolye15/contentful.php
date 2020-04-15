<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Delivery\Unit\Synchronization;

use Atolye15\Delivery\Synchronization\Result;
use Atolye15\Tests\Delivery\TestCase;

class ResultTest extends TestCase
{
    public function testGetter()
    {
        $arr = [];
        $result = new Result($arr, 'token', false);

        $this->assertSame($arr, $result->getItems());
        $this->assertSame('token', $result->getToken());
        $this->assertFalse($result->isDone());
    }
}
