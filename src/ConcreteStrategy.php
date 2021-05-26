<?php


class ConcreteStrategy implements IStrategy
{
    function isPlayable(array $players): bool
    {
        return (count($players) >= 2);
    }
}
