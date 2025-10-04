<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\ForwardChannelContextToSystemConfigServiceRule;

/**
 * @extends RuleTestCase<ForwardChannelContextToSystemConfigServiceRule>
 */
class ForwardChannelContextToSystemConfigServiceRuleTest extends RuleTestCase
{
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/fixtures/ForwardChannelContextToSystemConfigServiceRule/correct-usage.php'], []);
        $this->analyse([__DIR__ . '/fixtures/ForwardChannelContextToSystemConfigServiceRule/wrong-usage.php'], [
            [
                'SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error',
                21,
            ],
            [
                'SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error',
                22,
            ],
            [
                'SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error',
                23,
            ],
            [
                'SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error',
                24,
            ],
            [
                'SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error',
                25,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        return new ForwardChannelContextToSystemConfigServiceRule($this->createReflectionProvider());
    }
}
