<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\AI\Tools\PayToolParams\Prompts;
use Telnyx\AI\Tools\PayToolParams\ValidCardType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type PostalCodeVariants from \Telnyx\AI\Tools\PayToolParams\PostalCode
 * @phpstan-import-type PostalCodeShape from \Telnyx\AI\Tools\PayToolParams\PostalCode
 * @phpstan-import-type PromptsShape from \Telnyx\AI\Tools\PayToolParams\Prompts
 *
 * @phpstan-type PayToolParamsShape = array{
 *   connectorName: string,
 *   connectorParameters?: array<string,mixed>|null,
 *   currency?: string|null,
 *   description?: string|null,
 *   interDigitTimeoutMillis?: int|null,
 *   maxAttempts?: int|null,
 *   minPostalCodeLength?: int|null,
 *   paymentMethod?: string|null,
 *   postalCode?: PostalCodeShape|null,
 *   prompts?: null|Prompts|PromptsShape,
 *   timeoutMillis?: int|null,
 *   validCardTypes?: list<ValidCardType|value-of<ValidCardType>>|null,
 * }
 */
final class PayToolParams implements BaseModel
{
    /** @use SdkModel<PayToolParamsShape> */
    use SdkModel;

    /**
     * The name of the pay connector configured in the Telnyx API. Must reference an existing pay connector for this organization.
     */
    #[Required('connector_name')]
    public string $connectorName;

    /**
     * Custom key/value parameters forwarded to the pay connector as `parameters` in the processor request. String values may use `{{dynamic_variable}}` templating, resolved per call.
     *
     * @var array<string,mixed>|null $connectorParameters
     */
    #[Optional('connector_parameters', map: 'mixed')]
    public ?array $connectorParameters;

    /**
     * Default currency for payments processed by this tool.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Description of the pay tool shown to the assistant so it knows when to call the tool. Not sent to the payment connector — the per-call `description` argument the assistant passes is what reaches the processor.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * Time in milliseconds to wait between consecutive DTMF digits. Omitted means the platform default (5000) applies.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * Maximum number of attempts for each payment collection step. Omitted means the platform default (3) applies.
     */
    #[Optional('max_attempts')]
    public ?int $maxAttempts;

    /**
     * Minimum number of digits the caller must enter when collecting a credit-card billing postal code. Applies only when `postal_code` prompts the caller. Omitted means the platform default (1) applies. The maximum number of digits collected is the greater of 10 and this value. This does not validate the length of a postal code supplied directly in `postal_code`.
     */
    #[Optional('min_postal_code_length')]
    public ?int $minPostalCodeLength;

    /**
     * Default payment method for payments processed by this tool.
     */
    #[Optional('payment_method')]
    public ?string $paymentMethod;

    /**
     * Controls billing postal code collection for credit-card payments. Set to `false` to skip the postal code prompt without supplying a postal code to the payment connector (non-US cards, e.g. Irish Eircodes). Set to `true` to prompt the caller. Supply a non-empty string, such as `"90210"`, to use that postal code without prompting. This option does not affect ACH debit payments or payments using an existing token.
     *
     * @var PostalCodeVariants|null $postalCode
     */
    #[Optional('postal_code')]
    public string|bool|null $postalCode;

    /**
     * Custom text-to-speech prompts keyed by payment collection step. The AI assistant merges its own card-number prompt into this map, matching on the same step keys.
     */
    #[Optional]
    public ?Prompts $prompts;

    /**
     * Time in milliseconds to wait for DTMF input for each collection step. Omitted means the platform default (5000) applies. Increase this for slower entry, e.g. a 16-digit card number.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * Restricts accepted card numbers to the listed card types. When the caller enters a card number that does not match one of the listed types, Pay treats the input as invalid and re-prompts for the card number.
     *
     * @var list<value-of<ValidCardType>>|null $validCardTypes
     */
    #[Optional('valid_card_types', list: ValidCardType::class)]
    public ?array $validCardTypes;

    /**
     * `new PayToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayToolParams::with(connectorName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayToolParams)->withConnectorName(...)
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
     *
     * @param array<string,mixed>|null $connectorParameters
     * @param PostalCodeShape|null $postalCode
     * @param Prompts|PromptsShape|null $prompts
     * @param list<ValidCardType|value-of<ValidCardType>>|null $validCardTypes
     */
    public static function with(
        string $connectorName,
        string|Omitted|null $description = Omitted::VALUE,
        ?array $connectorParameters = null,
        ?string $currency = null,
        ?int $interDigitTimeoutMillis = null,
        ?int $maxAttempts = null,
        ?int $minPostalCodeLength = null,
        ?string $paymentMethod = null,
        string|bool|null $postalCode = null,
        Prompts|array|null $prompts = null,
        ?int $timeoutMillis = null,
        ?array $validCardTypes = null,
    ): self {
        $self = new self;

        $self['connectorName'] = $connectorName;

        null !== $connectorParameters && $self['connectorParameters'] = $connectorParameters;
        null !== $currency && $self['currency'] = $currency;
        Omitted::VALUE !== $description && $self['description'] = $description;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $maxAttempts && $self['maxAttempts'] = $maxAttempts;
        null !== $minPostalCodeLength && $self['minPostalCodeLength'] = $minPostalCodeLength;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $prompts && $self['prompts'] = $prompts;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $validCardTypes && $self['validCardTypes'] = $validCardTypes;

        return $self;
    }

    /**
     * The name of the pay connector configured in the Telnyx API. Must reference an existing pay connector for this organization.
     */
    public function withConnectorName(string $connectorName): self
    {
        $self = clone $this;
        $self['connectorName'] = $connectorName;

        return $self;
    }

    /**
     * Custom key/value parameters forwarded to the pay connector as `parameters` in the processor request. String values may use `{{dynamic_variable}}` templating, resolved per call.
     *
     * @param array<string,mixed> $connectorParameters
     */
    public function withConnectorParameters(array $connectorParameters): self
    {
        $self = clone $this;
        $self['connectorParameters'] = $connectorParameters;

        return $self;
    }

    /**
     * Default currency for payments processed by this tool.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Description of the pay tool shown to the assistant so it knows when to call the tool. Not sent to the payment connector — the per-call `description` argument the assistant passes is what reaches the processor.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Time in milliseconds to wait between consecutive DTMF digits. Omitted means the platform default (5000) applies.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * Maximum number of attempts for each payment collection step. Omitted means the platform default (3) applies.
     */
    public function withMaxAttempts(int $maxAttempts): self
    {
        $self = clone $this;
        $self['maxAttempts'] = $maxAttempts;

        return $self;
    }

    /**
     * Minimum number of digits the caller must enter when collecting a credit-card billing postal code. Applies only when `postal_code` prompts the caller. Omitted means the platform default (1) applies. The maximum number of digits collected is the greater of 10 and this value. This does not validate the length of a postal code supplied directly in `postal_code`.
     */
    public function withMinPostalCodeLength(int $minPostalCodeLength): self
    {
        $self = clone $this;
        $self['minPostalCodeLength'] = $minPostalCodeLength;

        return $self;
    }

    /**
     * Default payment method for payments processed by this tool.
     */
    public function withPaymentMethod(string $paymentMethod): self
    {
        $self = clone $this;
        $self['paymentMethod'] = $paymentMethod;

        return $self;
    }

    /**
     * Controls billing postal code collection for credit-card payments. Set to `false` to skip the postal code prompt without supplying a postal code to the payment connector (non-US cards, e.g. Irish Eircodes). Set to `true` to prompt the caller. Supply a non-empty string, such as `"90210"`, to use that postal code without prompting. This option does not affect ACH debit payments or payments using an existing token.
     *
     * @param PostalCodeShape $postalCode
     */
    public function withPostalCode(string|bool $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Custom text-to-speech prompts keyed by payment collection step. The AI assistant merges its own card-number prompt into this map, matching on the same step keys.
     *
     * @param Prompts|PromptsShape $prompts
     */
    public function withPrompts(Prompts|array $prompts): self
    {
        $self = clone $this;
        $self['prompts'] = $prompts;

        return $self;
    }

    /**
     * Time in milliseconds to wait for DTMF input for each collection step. Omitted means the platform default (5000) applies. Increase this for slower entry, e.g. a 16-digit card number.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * Restricts accepted card numbers to the listed card types. When the caller enters a card number that does not match one of the listed types, Pay treats the input as invalid and re-prompts for the card number.
     *
     * @param list<ValidCardType|value-of<ValidCardType>> $validCardTypes
     */
    public function withValidCardTypes(array $validCardTypes): self
    {
        $self = clone $this;
        $self['validCardTypes'] = $validCardTypes;

        return $self;
    }
}
