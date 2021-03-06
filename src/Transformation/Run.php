<?php

declare(strict_types=1);

namespace loophp\collection\Transformation;

use loophp\collection\Contract\Operation;
use loophp\collection\Contract\Transformation;
use loophp\collection\Iterator\ClosureIterator;

/**
 * Class Run.
 */
final class Run implements Transformation
{
    /**
     * @var \loophp\collection\Contract\Operation[]
     */
    private $operations;

    /**
     * Run constructor.
     *
     * @param \loophp\collection\Contract\Operation ...$operations
     */
    public function __construct(Operation ...$operations)
    {
        $this->operations = $operations;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(iterable $collection): ClosureIterator
    {
        return (
            new FoldLeft(
                static function (iterable $collection, Operation $operation): ClosureIterator {
                    return new ClosureIterator($operation(), $collection, ...array_values($operation->getArguments()));
                },
                $collection
            )
        )($this->operations);
    }
}
