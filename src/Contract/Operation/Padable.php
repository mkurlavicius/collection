<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use loophp\collection\Contract\Base;

/**
 * Interface Padable.
 */
interface Padable
{
    /**
     * Pad a collection to the given length with a given value.
     *
     * @param int $size
     * @param mixed $value
     *
     * @return \loophp\collection\Base<mixed>|\loophp\collection\Contract\Collection<mixed>
     */
    public function pad(int $size, $value): Base;
}
