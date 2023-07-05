<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class SecondTest extends TestCase
{

    public function testFruits(): void
    {
        $stack = ['apple', 'organge', 'pear'];
        $this->assertSame(3, count($stack));
    }
}
