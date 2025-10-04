<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\InternalMethodCallRule;

class InternalMethodCallRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new InternalMethodCallRule($this->createReflectionProvider());
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../../phpstan.neon',
        ];
    }

    public function testInternalMethodCallRule(): void
    {
        $this->analyse([
            __DIR__ . '/fixtures/InternalMethodCallRule/app/Test/case.php',
            __DIR__ . '/fixtures/InternalMethodCallRule/SomeClass.php',
        ], [
            [
                'Call of internal method HeyFrame\PhpStan\Tests\Rule\fixtures\InternalMethodCallRule\SomeClass::internalMethod Please refrain from using methods which are annotated with @internal in the HeyFrame 6 repository.',
                11,
            ],
        ]);
    }
}
