<?php

namespace GQ\Kata\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\Type\VoidType;

final class GameOfLifeTest extends TestCase
{

  private function nextState(Cell $cell, int $aliveNeighboursCount): Cell
  {
    if ($aliveNeighboursCount === 2 || $aliveNeighboursCount === 3) {
      return Cell::Alive;
    }
    return Cell::Dead;
  }

  #[Test]
  public function a_cell_dies_if_less_than_2_live_neighbours(): void
  {
    $cell = Cell::Alive;
    self::assertEquals(Cell::Dead, $this->nextState($cell, 0));
    self::assertEquals(Cell::Dead, $this->nextState($cell, 1));
  }

  #[Test]
  public function a_cell_stays_alive_if_2_or_3_live_neighbours(): void
  {
    $cell = Cell::Alive;
    self::assertEquals(Cell::Alive, $this->nextState($cell, 2));
    self::assertEquals(Cell::Alive, $this->nextState($cell, 3));
  }

  #[Test]
  public function a_cell_dies_if_more_than_3_live_neighbours(): void
  {
    $cell = Cell::Alive;
    foreach (range(4, 8) as $aliveNeighboursCount) {
      self::assertEquals(Cell::Dead, $this->nextState($cell, $aliveNeighboursCount));
    }
  }
}

