<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule\Fixtures\NoSessionInPaymentHandlerAndStoreApi;

use HeyFrame\Core\Checkout\Payment\Cart\PaymentHandler\AbstractPaymentHandler;
use HeyFrame\Core\Checkout\Payment\Cart\PaymentHandler\PaymentHandlerInterface;
use HeyFrame\Core\Checkout\Payment\Cart\PaymentHandler\PaymentHandlerType;
use HeyFrame\Core\Checkout\Payment\Cart\PaymentTransactionStruct;
use HeyFrame\Core\Framework\Context;
use HeyFrame\Core\Framework\Struct\Struct;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PaymentHandlerWithSession extends AbstractPaymentHandler implements PaymentHandlerInterface
{
    public function __construct(
        private readonly SessionInterface $session,
    ) {}

    public function pay(Request $request, PaymentTransactionStruct $transaction, Context $context, ?Struct $validateStruct = null): ?RedirectResponse
    {
        $this->session->get('foo');

        return null;
    }

    public function supports(PaymentHandlerType $type, string $paymentMethodId, Context $context): bool
    {
        return true;
    }
}
