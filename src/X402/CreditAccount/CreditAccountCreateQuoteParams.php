<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a payment quote for the specified USD amount. Returns payment details including the x402 payment requirements, network, and expiration time. The quote must be settled before it expires.
 *
 * @see Telnyx\Services\X402\CreditAccountService::createQuote()
 *
 * @phpstan-type CreditAccountCreateQuoteParamsShape = array{amountUsd: string}
 */
final class CreditAccountCreateQuoteParams implements BaseModel
{
    /** @use SdkModel<CreditAccountCreateQuoteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Amount in USD to fund (minimum 5.00, maximum 10000.00).
     */
    #[Required('amount_usd')]
    public string $amountUsd;

    /**
     * `new CreditAccountCreateQuoteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreditAccountCreateQuoteParams::with(amountUsd: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreditAccountCreateQuoteParams)->withAmountUsd(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $amountUsd): self
    {
        $self = new self;

        $self['amountUsd'] = $amountUsd;

        return $self;
    }

    /**
     * Amount in USD to fund (minimum 5.00, maximum 10000.00).
     */
    public function withAmountUsd(string $amountUsd): self
    {
        $self = clone $this;
        $self['amountUsd'] = $amountUsd;

        return $self;
    }
}
