<?php

namespace Repat\LaravelRules;

use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;

class TestNricFin extends TestCase
{
    /**
     * @dataProvider validProvider
     */
    public function testValidNric(string $nric): void
    {
        $this->assertTrue((new NricFin())->passes('', $nric));
    }

    /**
     * @dataProvider invalidProvider
     */
    public function testInvalidNric(?string $nric): void
    {
        $this->assertFalse((new NricFin())->passes('', $nric));
    }

    public static function invalidProvider(): iterable
    {
        yield 'Too short string' => [Str::random(8)];
        yield 'Too long string' => [Str::random(10)];
        yield 'Empty string' => [''];
        yield 'Null' => [null];
        yield 'Correct length but random' => [Str::random(9)];
        yield 'Invalid checksum 1' => ['T5717279A'];
        yield 'Invalid checksum 2' => ['F6470401K'];
        yield 'Invalid checksum 3' => ['G8877699L'];
        yield 'Invalid checksum 4' => ['M8877689K'];
    }

    public static function validProvider(): iterable
    {
        yield 'First president of Singapore' => ['S0000001I'];
        yield 'S6083480F' => ['S6083480F'];
        yield 'T5717279C' => ['T5717279C'];
        yield 'F6470401W' => ['F6470401W'];
        yield 'G8877699U' => ['G8877699U'];
        yield 'M5043078W' => ['M5043078W'];
        yield 'M2424771J' => ['M2424771J'];
    }
}
