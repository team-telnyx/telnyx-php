<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\PayToolParams;

use Telnyx\AI\Tools\PayToolParams\Prompts\BankAccountNumber;
use Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber;
use Telnyx\AI\Tools\PayToolParams\Prompts\ExpirationDate;
use Telnyx\AI\Tools\PayToolParams\Prompts\PaymentCardNumber;
use Telnyx\AI\Tools\PayToolParams\Prompts\PostalCode;
use Telnyx\AI\Tools\PayToolParams\Prompts\SecurityCode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Custom text-to-speech prompts keyed by payment collection step. The AI assistant merges its own card-number prompt into this map, matching on the same step keys.
 *
 * @phpstan-import-type BankAccountNumberVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\BankAccountNumber
 * @phpstan-import-type BankRoutingNumberVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber
 * @phpstan-import-type ExpirationDateVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\ExpirationDate
 * @phpstan-import-type PaymentCardNumberVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\PaymentCardNumber
 * @phpstan-import-type PostalCodeVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\PostalCode
 * @phpstan-import-type SecurityCodeVariants from \Telnyx\AI\Tools\PayToolParams\Prompts\SecurityCode
 * @phpstan-import-type BankAccountNumberShape from \Telnyx\AI\Tools\PayToolParams\Prompts\BankAccountNumber
 * @phpstan-import-type BankRoutingNumberShape from \Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber
 * @phpstan-import-type ExpirationDateShape from \Telnyx\AI\Tools\PayToolParams\Prompts\ExpirationDate
 * @phpstan-import-type PaymentCardNumberShape from \Telnyx\AI\Tools\PayToolParams\Prompts\PaymentCardNumber
 * @phpstan-import-type PostalCodeShape from \Telnyx\AI\Tools\PayToolParams\Prompts\PostalCode
 * @phpstan-import-type SecurityCodeShape from \Telnyx\AI\Tools\PayToolParams\Prompts\SecurityCode
 *
 * @phpstan-type PromptsShape = array{
 *   bankAccountNumber?: BankAccountNumberShape|null,
 *   bankRoutingNumber?: BankRoutingNumberShape|null,
 *   expirationDate?: ExpirationDateShape|null,
 *   paymentCardNumber?: PaymentCardNumberShape|null,
 *   postalCode?: PostalCodeShape|null,
 *   securityCode?: SecurityCodeShape|null,
 * }
 */
final class Prompts implements BaseModel
{
    /** @use SdkModel<PromptsShape> */
    use SdkModel;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var BankAccountNumberVariants|null $bankAccountNumber
     */
    #[Optional('bank-account-number', union: BankAccountNumber::class)]
    public string|array|null $bankAccountNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var BankRoutingNumberVariants|null $bankRoutingNumber
     */
    #[Optional('bank-routing-number', union: BankRoutingNumber::class)]
    public string|array|null $bankRoutingNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var ExpirationDateVariants|null $expirationDate
     */
    #[Optional('expiration-date', union: ExpirationDate::class)]
    public string|array|null $expirationDate;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PaymentCardNumberVariants|null $paymentCardNumber
     */
    #[Optional('payment-card-number', union: PaymentCardNumber::class)]
    public string|array|null $paymentCardNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PostalCodeVariants|null $postalCode
     */
    #[Optional(
        'postal-code',
        union: PostalCode::class,
    )]
    public string|array|null $postalCode;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var SecurityCodeVariants|null $securityCode
     */
    #[Optional('security-code', union: SecurityCode::class)]
    public string|array|null $securityCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BankAccountNumberShape|null $bankAccountNumber
     * @param BankRoutingNumberShape|null $bankRoutingNumber
     * @param ExpirationDateShape|null $expirationDate
     * @param PaymentCardNumberShape|null $paymentCardNumber
     * @param PostalCodeShape|null $postalCode
     * @param SecurityCodeShape|null $securityCode
     */
    public static function with(
        string|array|null $bankAccountNumber = null,
        string|array|null $bankRoutingNumber = null,
        string|array|null $expirationDate = null,
        string|array|null $paymentCardNumber = null,
        string|array|null $postalCode = null,
        string|array|null $securityCode = null,
    ): self {
        $self = new self;

        null !== $bankAccountNumber && $self['bankAccountNumber'] = $bankAccountNumber;
        null !== $bankRoutingNumber && $self['bankRoutingNumber'] = $bankRoutingNumber;
        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $paymentCardNumber && $self['paymentCardNumber'] = $paymentCardNumber;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $securityCode && $self['securityCode'] = $securityCode;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param BankAccountNumberShape $bankAccountNumber
     */
    public function withBankAccountNumber(string|array $bankAccountNumber): self
    {
        $self = clone $this;
        $self['bankAccountNumber'] = $bankAccountNumber;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param BankRoutingNumberShape $bankRoutingNumber
     */
    public function withBankRoutingNumber(string|array $bankRoutingNumber): self
    {
        $self = clone $this;
        $self['bankRoutingNumber'] = $bankRoutingNumber;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param ExpirationDateShape $expirationDate
     */
    public function withExpirationDate(string|array $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param PaymentCardNumberShape $paymentCardNumber
     */
    public function withPaymentCardNumber(string|array $paymentCardNumber): self
    {
        $self = clone $this;
        $self['paymentCardNumber'] = $paymentCardNumber;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param PostalCodeShape $postalCode
     */
    public function withPostalCode(string|array $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @param SecurityCodeShape $securityCode
     */
    public function withSecurityCode(string|array $securityCode): self
    {
        $self = clone $this;
        $self['securityCode'] = $securityCode;

        return $self;
    }
}
