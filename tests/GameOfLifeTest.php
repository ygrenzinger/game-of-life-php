<?php

namespace GQ\Kata\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class GameOfLifeTest extends TestCase
{

  private function nextState(Cell $cell, int $aliveNeighboursCount): Cell
  {
    if ($cell === Cell::Dead && $aliveNeighboursCount === 2) {
      return Cell::Dead;
    }
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

  #[Test]
  public function a_cell_reborns_if_it_has_3_live_neighbours(): void
  {
    $cell = Cell::Dead;
    self::assertEquals(Cell::Alive, $this->nextState($cell, 3));
  }

  #[Test]
  public function a_dead_cell_stays_dead_if_does_not_have_3_live_neighbours():void
  {
    $cell = Cell::Dead;
    foreach (range(0, 8) as $aliveNeighboursCount) {
      if ($aliveNeighboursCount !== 3) {
        self::assertEquals(Cell::Dead, $this->nextState($cell, $aliveNeighboursCount));
      }
    }
  }
}

