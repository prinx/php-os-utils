<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Prinx\Os;

class EnvTest extends TestCase
{
    public function testSlash()
    {
        $this->assertEquals(Os::slash(), DIRECTORY_SEPARATOR);
        $this->assertEquals(Os::slash('win'), '\\');
        $this->assertEquals(Os::slash('windows'), '\\');
        $this->assertEquals(Os::slash('linux'), '/');
        $this->assertEquals(Os::slash('mac'), '/');
        $this->assertEquals(Os::slash('forward'), '/');
        $this->assertEquals(Os::slash('backward'), '/');
    }

    public function testPlatformPathStyle()
    {
        $withForward = '/home/docs/codes';
        $withBackward = '\\home\\docs\\codes';
        $this->assertEquals(Os::toPathStyle($withForward, 'win'), $withBackward);
        $this->assertEquals(Os::toPathStyle($withBackward, 'linux'), $withForward);
    }
}
