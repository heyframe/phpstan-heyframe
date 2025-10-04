<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\NoSymfonySessionInConstructorRule;

/**
 * @extends RuleTestCase<NoSymfonySessionInConstructorRule>
 */
class NoSymfonySessionInConstructorTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoSymfonySessionInConstructorRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/fixtures/NoSymfonySessionInConstructorRule/NoSymfonySessionInConstructor.php'], [
            [
                'Symfony Session should not be called in constructor. Consider using it in the method where it\'s needed.',
                17,
            ],
        ]);
    }
}
