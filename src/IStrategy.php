<?php

interface IStrategy
{
    function isPlayable(array $players): bool;
}
