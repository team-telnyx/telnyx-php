<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionPayParams;

use Telnyx\Calls\Actions\PayPromptValue;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Custom text-to-speech prompts keyed by payment collection step.
 *
 * @phpstan-import-type PayPromptValueShape from \Telnyx\Calls\Actions\PayPromptValue
 * @phpstan-import-type PayPromptValueVariants from \Telnyx\Calls\Actions\PayPromptValue
 *
 * @phpstan-type PromptsShape = array{
 *   bankAccountNumber?: PayPromptValueShape|null,
 *   bankRoutingNumber?: PayPromptValueShape|null,
 *   expirationDate?: PayPromptValueShape|null,
 *   paymentCardNumber?: PayPromptValueShape|null,
 *   postalCode?: PayPromptValueShape|null,
 *   securityCode?: PayPromptValueShape|null,
 * }
 */
final class Prompts implements BaseModel
{
    /** @use SdkModel<PromptsShape> */
    use SdkModel;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $bankAccountNumber
     */
    #[Optional('bank-account-number', union: PayPromptValue::class)]
    public string|array|null $bankAccountNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $bankRoutingNumber
     */
    #[Optional('bank-routing-number', union: PayPromptValue::class)]
    public string|array|null $bankRoutingNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $expirationDate
     */
    #[Optional('expiration-date', union: PayPromptValue::class)]
    public string|array|null $expirationDate;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $paymentCardNumber
     */
    #[Optional('payment-card-number', union: PayPromptValue::class)]
    public string|array|null $paymentCardNumber;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $postalCode
     */
    #[Optional('postal-code', union: PayPromptValue::class)]
    public string|array|null $postalCode;

    /**
     * A default prompt string or an ordered list of qualified prompts.
     *
     * @var PayPromptValueVariants|null $securityCode
     */
    #[Optional('security-code', union: PayPromptValue::class)]
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
     * @param PayPromptValueShape|null $bankAccountNumber
     * @param PayPromptValueShape|null $bankRoutingNumber
     * @param PayPromptValueShape|null $expirationDate
     * @param PayPromptValueShape|null $paymentCardNumber
     * @param PayPromptValueShape|null $postalCode
     * @param PayPromptValueShape|null $securityCode
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
     * @param PayPromptValueShape $bankAccountNumber
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
     * @param PayPromptValueShape $bankRoutingNumber
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
     * @param PayPromptValueShape $expirationDate
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
     * @param PayPromptValueShape $paymentCardNumber
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
     * @param PayPromptValueShape $postalCode
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
     * @param PayPromptValueShape $securityCode
     */
    public function withSecurityCode(string|array $securityCode): self
    {
        $self = clone $this;
        $self['securityCode'] = $securityCode;

        return $self;
    }
}
