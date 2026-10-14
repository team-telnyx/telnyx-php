<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\AI\Tools\PayToolParams\ValidCardType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type PayToolParamsShape = array{
 *   connectorName: string,
 *   connectorParameters?: array<string,mixed>|null,
 *   currency?: string|null,
 *   description?: string|null,
 *   paymentMethod?: string|null,
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
     * Default payment method for payments processed by this tool.
     */
    #[Optional('payment_method')]
    public ?string $paymentMethod;

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
     * @param list<ValidCardType|value-of<ValidCardType>>|null $validCardTypes
     */
    public static function with(
        string $connectorName,
        string|Omitted|null $description = Omitted::VALUE,
        ?array $connectorParameters = null,
        ?string $currency = null,
        ?string $paymentMethod = null,
        ?array $validCardTypes = null,
    ): self {
        $self = new self;

        $self['connectorName'] = $connectorName;

        null !== $connectorParameters && $self['connectorParameters'] = $connectorParameters;
        null !== $currency && $self['currency'] = $currency;
        Omitted::VALUE !== $description && $self['description'] = $description;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
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
     * Default payment method for payments processed by this tool.
     */
    public function withPaymentMethod(string $paymentMethod): self
    {
        $self = clone $this;
        $self['paymentMethod'] = $paymentMethod;

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
