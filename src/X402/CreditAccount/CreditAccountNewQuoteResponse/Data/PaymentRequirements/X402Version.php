<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements;

/**
 * x402 protocol version. Currently always 2.
 */
enum X402Version: int
{
    case X402_VERSION_2 = 2;
}
