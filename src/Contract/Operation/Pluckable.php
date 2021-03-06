<?php

declare(strict_types=1);

namespace loophp\collection\Contract\Operation;

use loophp\collection\Contract\Base;

/**
 * Interface Pluckable.
 */
interface Pluckable
{
    /**
     * Retrieves all of the values of a collection for a given key.
     *
     * @param array<int, string>|string $pluck
     * @param mixed|null $default
     *
     * @return \loophp\collection\Base<mixed>|\loophp\collection\Contract\Collection<mixed>
     */
    public function pluck($pluck, $default = null): Base;
}
