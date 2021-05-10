<?php

namespace Repat\LaravelRules;

use Illuminate\Support\Str;

class TestNricFin extends \Orchestra\Testbench\TestCase
{
    public function testValidNric()
    {
        // First NRIC ever - first president of Singapore
        $yusofBinIshak = 'S0000001I';

        $nricFin = new NricFin();
        $this->assertTrue($nricFin->passes('', $yusofBinIshak), $yusofBinIshak);
    }

    public function testTooShortString()
    {
        $nricFin = new NricFin();
        $this->assertFalse($nricFin->passes('', Str::random(8)));
    }

    public function testTooLongString()
    {
        $nricFin = new NricFin();
        $this->assertFalse($nricFin->passes('', Str::random(10)));
    }

    public function testEmptyString()
    {
        $nricFin = new NricFin();
        $this->assertFalse($nricFin->passes('', ''));
    }

    public function testNull()
    {
        $nricFin = new NricFin();
        $this->assertFalse($nricFin->passes('', null));
    }

    public function testCorrectLengthButRandom()
    {
        $nricFin = new NricFin();
        $this->assertFalse($nricFin->passes('', Str::random(9)));
    }
}
