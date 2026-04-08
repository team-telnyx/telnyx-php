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
 * @see Telnyx\Services\X402\CreditAccountService::settle()
 *
 * @phpstan-type CreditAccountSettleParamsShape = array{
 *   id: string,
 *   paymentSignature?: string|null,
 *   headerPaymentSignature?: string|null,
 * }
 */
final class CreditAccountSettleParams implements BaseModel
{
    /** @use SdkModel<CreditAccountSettleParamsShape> */
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
    public ?string $headerPaymentSignature;

    /**
     * `new CreditAccountSettleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreditAccountSettleParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreditAccountSettleParams)->withID(...)
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
        ?string $headerPaymentSignature = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $paymentSignature && $self['paymentSignature'] = $paymentSignature;
        null !== $headerPaymentSignature && $self['headerPaymentSignature'] = $headerPaymentSignature;

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

    public function withHeaderPaymentSignature(
        string $headerPaymentSignature
    ): self {
        $self = clone $this;
        $self['headerPaymentSignature'] = $headerPaymentSignature;

        return $self;
    }
}
