<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    const GOLDEN_MASTER = "golden-master.txt";

    protected function setUp()
    {
        $this->createGoldenMaster();
        $this->generateOutputs(5);
    }

    public function testShouldCreateGoldenMaster()
    {
        $this->assertTrue(file_exists(self::GOLDEN_MASTER));
    }

    private function createGoldenMaster()
    {
        file_put_contents(self::GOLDEN_MASTER, "");
    }

    private function generateOutputs(int $seed)
    {
        do {
            exec("php ../src/GameRunner.php", $output);
            file_put_contents(self::GOLDEN_MASTER, join($output, PHP_EOL), FILE_APPEND);
            --$seed;
        } while ($seed > 0);
    }
}
