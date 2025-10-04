<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use HeyFrame\PhpStan\Rule\DisallowDefaultContextCreation;
use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 *
 * @extends  RuleTestCase<DisallowDefaultContextCreation>
 */
class DisallowDefaultContextCreationTest extends RuleTestCase
{
    public function testAnalyse(): void
    {
        $this->analyse([__DIR__ . '/fixtures/DisallowDefaultContextCreation/context.php'], [
            [
                <<<EOF
Do not use HeyFrame\Core\Framework\Context::createDefaultContext() function in code.
    💡 • If you are in a CLI context, use %s::createCliContext() instead.
• If you are in a web context, pass down the context from the controller.
EOF,
                5,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        return new DisallowDefaultContextCreation(self::createReflectionProvider());
    }
}
