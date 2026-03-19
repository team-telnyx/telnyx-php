<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settles an x402 payment using the quote ID and a signed payment authorization. The payment signature can be provided via the `PAYMENT-SIGNATURE` header or the `payment_signature` body parameter. Settlement is idempotent — submitting the same quote ID multiple times returns the existing transaction.
 *
 * @see Telnyx\Services\X402\CreditAccountService::settlePayment()
 *
 * @phpstan-type CreditAccountSettlePaymentParamsShape = array{
 *   id: string, paymentSignature?: string|null, paymentSignature1?: string|null
 * }
 */
final class CreditAccountSettlePaymentParams implements BaseModel
{
    /** @use SdkModel<CreditAccountSettlePaymentParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The quote ID to settle.
     */
    #[Required]
    public string $id;

    /**
     * Base64-encoded signed payment authorization (x402 PaymentPayload). Can alternatively be provided via the PAYMENT-SIGNATURE header.
     */
    #[Optional('payment_signature')]
    public ?string $paymentSignature;

    #[Optional]
    public ?string $paymentSignature1;

    /**
     * `new CreditAccountSettlePaymentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreditAccountSettlePaymentParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreditAccountSettlePaymentParams)->withID(...)
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
    public static function with(
        string $id,
        ?string $paymentSignature = null,
        ?string $paymentSignature1 = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $paymentSignature && $self['paymentSignature'] = $paymentSignature;
        null !== $paymentSignature1 && $self['paymentSignature1'] = $paymentSignature1;

        return $self;
    }

    /**
     * The quote ID to settle.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Base64-encoded signed payment authorization (x402 PaymentPayload). Can alternatively be provided via the PAYMENT-SIGNATURE header.
     */
    public function withPaymentSignature(string $paymentSignature): self
    {
        $self = clone $this;
        $self['paymentSignature'] = $paymentSignature;

        return $self;
    }

    public function withPaymentSignature1(string $paymentSignature): self
    {
        $self = clone $this;
        $self['paymentSignature1'] = $paymentSignature;

        return $self;
    }
}
