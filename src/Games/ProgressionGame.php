<?php

namespace Php\Project\Games\ProgressionGame;

use function Php\Project\Engine\runGame;

function runProgressionGame(): void
{
    $task = "What number is missing in the progression?";
    $gameData = function (): array {
        $progreissonSize = mt_rand(5, 10);
        $progression = generateProgression($progreissonSize);
        $randIndex = mt_rand(0, $progreissonSize - 1);
        $correctAnswer = (string) $progression[$randIndex];
        $progression[$randIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };

    runGame($task, $gameData);
}

function generateProgression(int $size): array
{
    $progression = [];
    $progressionStep = mt_rand(1, 10);
    $currentNum = mt_rand(1, 50);
    for ($i = 0; $i < $size; $i++) {
        $progression[] = $currentNum;
        $currentNum += $progressionStep;
    }
    return $progression;
}
