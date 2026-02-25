<?php

declare(strict_types=1);

namespace Telnyx\Payment;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a stored payment transaction.
 *
 * @see Telnyx\Services\PaymentService::createStoredPaymentTransaction()
 *
 * @phpstan-type PaymentCreateStoredPaymentTransactionParamsShape = array{
 *   amount: string
 * }
 */
final class PaymentCreateStoredPaymentTransactionParams implements BaseModel
{
    /** @use SdkModel<PaymentCreateStoredPaymentTransactionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Amount in dollars and cents, e.g. "120.00".
     */
    #[Required]
    public string $amount;

    /**
     * `new PaymentCreateStoredPaymentTransactionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentCreateStoredPaymentTransactionParams::with(amount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentCreateStoredPaymentTransactionParams)->withAmount(...)
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
    public static function with(string $amount): self
    {
        $self = new self;

        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Amount in dollars and cents, e.g. "120.00".
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }
}
