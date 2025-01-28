<?php

namespace Php\Project\Games\ProgressionGame;

use function Php\Project\Engine\runGame;

const GAME_RULES = 'What number is missing in the progression?';

function runProgressionGame(): void
{
    $getGameData = function (): array {
        $progreissonSize = mt_rand(5, 10);
        $progressionStep = mt_rand(1, 10);
        $firstNum = mt_rand(1, 50);

        $progression = generateProgression(
            $progreissonSize,
            $progressionStep,
            $firstNum
        );

        $randIndex = mt_rand(0, $progreissonSize - 1);
        $correctAnswer = (string) $progression[$randIndex];
        $progression[$randIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };

    runGame(GAME_RULES, $getGameData);
}

function generateProgression(int $size, int $step, int $firstNum): array
{
    $progression = [];
    $currentNum = $firstNum;
    for ($i = 0; $i < $size; $i++) {
        $progression[] = $currentNum;
        $currentNum += $step;
    }
    return $progression;
}
