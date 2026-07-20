<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayToolParamsShape = array{
 *   connectorName: string,
 *   currency?: string|null,
 *   description?: string|null,
 *   paymentMethod?: string|null,
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
     * Default currency for payments processed by this tool.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Optional description of the pay tool that will be passed to the assistant.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * Default payment method for payments processed by this tool.
     */
    #[Optional('payment_method')]
    public ?string $paymentMethod;

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
     */
    public static function with(
        string $connectorName,
        ?string $currency = null,
        ?string $description = null,
        ?string $paymentMethod = null,
    ): self {
        $self = new self;

        $self['connectorName'] = $connectorName;

        null !== $currency && $self['currency'] = $currency;
        null !== $description && $self['description'] = $description;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;

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
     * Default currency for payments processed by this tool.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Optional description of the pay tool that will be passed to the assistant.
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
}
