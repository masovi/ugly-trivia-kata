<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    const GOLDEN_MASTER = __DIR__ . "\\golden-master.txt";
    const PROGRAM_PATH = __DIR__ . "\\..\\src\\GameRunner.php";

    protected function setUp()
    {
        $this->createGoldenMaster();
        $this->generateOutputs(50);
    }

    public function testShouldCreateGoldenMaster()
    {
        $this->assertTrue(file_exists(self::GOLDEN_MASTER));
    }

    public function testMakeScienceQuestion()
    {
        $game = new TestableGame("Science");
        $game->askQuestion();
        $actual = count($game->scienceQuestions);
        $this->assertEquals(49, $actual);
    }

    public function testMakePopQuestion() {
        $game = new TestableGame("Pop");
        $game->askQuestion();
        $actual = count($game->popQuestions);
        $this->assertEquals("49", $actual);
    }

    private function createGoldenMaster()
    {
        file_put_contents(self::GOLDEN_MASTER, "");
    }

    private function generateOutputs(int $seed)
    {
        do {
            exec("php " . self::PROGRAM_PATH, $output);
            file_put_contents(self::GOLDEN_MASTER, join($output, PHP_EOL), FILE_APPEND);
            --$seed;
        } while ($seed > 0);
    }
}
