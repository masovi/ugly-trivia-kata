<?php

class TestableGame extends Game
{
    private $currentCategory;
    private $strategy;

    public function __construct(string $currentCategory, IStrategy $strategy = null)
    {
        parent::__construct();

        $this->currentCategory = $currentCategory;
        $this->strategy = $strategy;
    }

    public function currentCategory(): string
    {
        return $this->currentCategory;
    }

    public function isPlayable(): bool
    {
        return $this->strategy->isPlayable($this->players);
    }
}
