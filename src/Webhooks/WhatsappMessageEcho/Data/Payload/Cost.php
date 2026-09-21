<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * No charge is created for a Business app message echo.
 *
 * @phpstan-type CostShape = array{amount?: string|null, currency?: string|null}
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $amount;

    #[Optional(nullable: true)]
    public ?string $currency;

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
        string|Omitted|null $amount = Omitted::VALUE,
        string|Omitted|null $currency = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $amount && $self['amount'] = $amount;
        Omitted::VALUE !== $currency && $self['currency'] = $currency;

        return $self;
    }

    public function withAmount(?string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withCurrency(?string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }
}
