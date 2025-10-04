<?php

declare(strict_types=1);

namespace Test\App;

use HeyFrame\PhpStan\Tests\Rule\fixtures\InternalMethodCallRule\SomeClass;

function test()
{
    (new SomeClass())->internalMethod();
}
