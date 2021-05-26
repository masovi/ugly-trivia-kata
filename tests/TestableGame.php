<?php

class TestableGame extends Game
{
    private $currentCategory;

    public function __construct(string $currentCategory)
    {
        parent::__construct();
        $this->currentCategory = $currentCategory;
    }

    public function currentCategory(): string
    {
        return $this->currentCategory;
    }
}
