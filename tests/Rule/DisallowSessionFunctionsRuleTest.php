<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\DisallowSessionFunctionsRule;

/**
 * @extends RuleTestCase<DisallowSessionFunctionsRule>
 */
class DisallowSessionFunctionsRuleTest extends RuleTestCase
{
    public function getRule(): Rule
    {
        return new DisallowSessionFunctionsRule();
    }

    public function testRule(): void
    {
        $this->analyse([
            __DIR__ . '/fixtures/DisallowSessionFunctionsRule/wrong-usage.php',
        ], [
            [
                'Do not use session_write_close() function in code. Use the Symfony Session component from the Request object instead.',
                5,
            ],
            [
                'Do not use session_start() function in code. Use the Symfony Session component from the Request object instead.',
                6,
            ],
            [
                'Do not use session_destroy() function in code. Use the Symfony Session component from the Request object instead.',
                7,
            ],
        ]);
    }
}
