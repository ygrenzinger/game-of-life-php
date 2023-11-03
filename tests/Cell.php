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
    if (in_array($aliveNeighboursCount, [2, 3], true)) {
      return $this;
    }

    return Cell::Dead;
  }

  private function handleDead(int $aliveNeighboursCount): self
  {
    return $aliveNeighboursCount === 3 ? Cell::Alive : Cell::Dead;
  }
}
