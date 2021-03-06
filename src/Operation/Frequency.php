<?php

declare(strict_types=1);

namespace loophp\collection\Operation;

use Closure;
use Generator;
use loophp\collection\Contract\Operation;

final class Frequency extends AbstractOperation implements Operation
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): Closure
    {
        return static function (iterable $collection): Generator {
            $storage = [];

            foreach ($collection as $value) {
                $added = false;

                foreach ($storage as $key => $data) {
                    if ($storage[$key]['value'] !== $value) {
                        continue;
                    }

                    ++$storage[$key]['count'];
                    $added = true;

                    break;
                }

                if (false === $added) {
                    $storage[] = [
                        'value' => $value,
                        'count' => 1,
                    ];
                }
            }

            foreach ($storage as $value) {
                yield $value['count'] => $value['value'];
            }
        };
    }
}
