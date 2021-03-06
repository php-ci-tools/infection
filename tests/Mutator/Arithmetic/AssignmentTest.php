<?php
/**
 * Copyright © 2017-2018 Maks Rafalko
 *
 * License: https://opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types=1);

namespace Infection\Tests\Mutator\Arithmetic;

use Infection\Tests\Mutator\AbstractMutatorTestCase;

/**
 * @internal
 */
final class AssignmentTest extends AbstractMutatorTestCase
{
    /**
     * @dataProvider provideMutationCases
     */
    public function test_mutator($input, $expected = null): void
    {
        $this->doTest($input, $expected);
    }

    public function provideMutationCases(): array
    {
        return [
            'It changes compound assignments to simple assignments' => [
                <<<'PHP'
<?php

$a += $b;
$a -= $b;
$a *= $b;
$a **= $b;
$a /= $b;
$a %= $b;
$a .= $b;
$a &= $b;
$a |= $b;
$a ^= $b;
$a <<= $b;
$a >>= $b;
PHP
                ,
                <<<'PHP'
<?php

$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
$a = $b;
PHP
                ,
            ],
        ];
    }
}
