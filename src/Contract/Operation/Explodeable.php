<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use loophp\collection\Contract\Base;

/**
 * Interface Explodeable.
 */
interface Explodeable
{
    /**
     * Explode a collection into subsets based on a given value.
     *
     * @param mixed ...$explodes
     *
     * @return \loophp\collection\Base<mixed>|\loophp\collection\Contract\Collection<mixed>
     */
    public function explode(...$explodes): Base;
}
