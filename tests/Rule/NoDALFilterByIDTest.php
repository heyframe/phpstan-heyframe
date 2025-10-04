<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\MethodBecomesAbstractRule;
use HeyFrame\PhpStan\Rule\NoDALFilterByID;

/**
 * @internal
 *
 * @extends  RuleTestCase<NoDALFilterByID>
 */
class NoDALFilterByIDTest extends RuleTestCase
{
    public function testAnalyse(): void
    {
        $this->analyse([ __DIR__ . '/fixtures/NoDALFilterByID/criteria.php'], [
            [
                <<<EOF
Using "id" directly in EqualsFilter or EqualsAnyFilter is forbidden. Pass the ids directly to the constructor of Criteria or use setIds instead
EOF,
                12,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        return new NoDALFilterByID();
    }
}
