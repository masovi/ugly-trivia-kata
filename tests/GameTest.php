<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    const GOLDEN_MASTER = "golden-master.txt";

    protected function setUp()
    {
        $this->createGoldenMaster();
    }

    public function testShouldCreateGoldenMaster() {
        $this->assertTrue(file_exists (self::GOLDEN_MASTER));
    }

    private function createGoldenMaster()
    {
        file_put_contents(self::GOLDEN_MASTER, "");
    }
}
