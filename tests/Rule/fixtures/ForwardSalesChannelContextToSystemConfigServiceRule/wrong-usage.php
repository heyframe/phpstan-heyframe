<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule\fixtures\ForwardSalesChannelContextToSystemConfigServiceRule;

use HeyFrame\Core\System\SalesChannel\SalesChannelContext;
use HeyFrame\Core\System\SystemConfig\SystemConfigService;

class WrongUsage
{
    private SystemConfigService $systemConfigService;

    public function __construct(SystemConfigService $systemConfigService)
    {
        $this->systemConfigService = $systemConfigService;
    }

    public function wrong(SalesChannelContext $salesChannelContext): void
    {
        $this->systemConfigService->get('foo.bar');
        $this->systemConfigService->getString('foo.bar');
        $this->systemConfigService->getInt('foo.bar');
        $this->systemConfigService->getFloat('foo.bar');
        $this->systemConfigService->getBool('foo.bar');
    }
}
