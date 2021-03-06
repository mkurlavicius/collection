<?php

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use loophp\collection\Contract\Operation;

final class Prepend extends AbstractOperation implements Operation
{
    /**
     * Prepend constructor.
     *
     * @param array<mixed, mixed> ...$items
     */
    public function __construct(...$items)
    {
        $this->storage['items'] = $items;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(): Closure
    {
        return static function (iterable $collection, array $items): Generator {
            foreach ($items as $item) {
                yield $item;
            }

            foreach ($collection as $value) {
                yield $value;
            }
        };
    }
}
