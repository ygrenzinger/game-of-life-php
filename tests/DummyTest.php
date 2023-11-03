<?php

namespace GQ\Kata\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class DummyTest extends TestCase
{
    #[Test]
    public function a_cell_dies_if_less_than_2_live_neighbours(): void
    {
        $cell = Cell::Alive;

        $nextState = function(Cell $cell, int $aliveNeighboursCount): Cell
        {
          return Cell::Dead;
        };
        self::assertEquals(Cell::Dead, $nextState($cell, 0));
    }
}

