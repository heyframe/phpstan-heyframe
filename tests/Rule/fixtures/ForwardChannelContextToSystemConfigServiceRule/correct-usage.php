<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule\fixtures\ForwardChannelContextToSystemConfigServiceRule;

use HeyFrame\Core\System\Channel\ChannelContext;
use HeyFrame\Core\System\SystemConfig\SystemConfigService;

class CorrectUsage
{
    private SystemConfigService $systemConfigService;

    public function __construct(SystemConfigService $systemConfigService)
    {
        $this->systemConfigService = $systemConfigService;
    }

    public function correct(ChannelContext $channelContext): void
    {
        $this->systemConfigService->get('foo.bar', $channelContext->getChannelId());
        $this->systemConfigService->getString('foo.bar', $channelContext->getChannel()->getId());
        $this->systemConfigService->getInt('foo.bar', $channelContext->getChannelId());
        $this->systemConfigService->getFloat('foo.bar', $channelContext->getChannelId());
        $this->systemConfigService->getBool('foo.bar', $channelContext->getChannelId());
    }

    public function correctWithoutContext(): void
    {
        $this->systemConfigService->get('foo.bar');
    }
}
