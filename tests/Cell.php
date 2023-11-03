<?php

namespace GQ\Kata\Tests;

enum Cell
{
  case Alive;
  case Dead;

  public function nextState(int $aliveNeighboursCount): self
  {
    return match($this) {
      Cell::Alive => $this->handleAlive($aliveNeighboursCount),
      Cell::Dead => $this->handleDead($aliveNeighboursCount),
    };
  }

  private function handleAlive(int $aliveNeighboursCount): self
  {
    if ($aliveNeighboursCount === 2 || $aliveNeighboursCount === 3) {
      return $this;
    }

    return Cell::Dead;
  }

  private function handleDead(int $aliveNeighboursCount): self
  {
    return $aliveNeighboursCount === 3 ? Cell::Alive : Cell::Dead;
  }
}
