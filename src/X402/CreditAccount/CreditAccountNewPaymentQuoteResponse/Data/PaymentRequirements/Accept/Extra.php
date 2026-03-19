<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\Accept;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Additional scheme-specific parameters including EIP-712 domain info and the facilitator URL.
 *
 * @phpstan-type ExtraShape = array{
 *   facilitatorURL?: string|null,
 *   name?: string|null,
 *   quoteID?: string|null,
 *   version?: string|null,
 * }
 */
final class Extra implements BaseModel
{
    /** @use SdkModel<ExtraShape> */
    use SdkModel;

    #[Optional('facilitatorUrl')]
    public ?string $facilitatorURL;

    /**
     * EIP-712 domain name (e.g. "USD Coin").
     */
    #[Optional]
    public ?string $name;

    #[Optional('quoteId')]
    public ?string $quoteID;

    /**
     * EIP-712 domain version.
     */
    #[Optional]
    public ?string $version;

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
        ?string $facilitatorURL = null,
        ?string $name = null,
        ?string $quoteID = null,
        ?string $version = null,
    ): self {
        $self = new self;

        null !== $facilitatorURL && $self['facilitatorURL'] = $facilitatorURL;
        null !== $name && $self['name'] = $name;
        null !== $quoteID && $self['quoteID'] = $quoteID;
        null !== $version && $self['version'] = $version;

        return $self;
    }

    public function withFacilitatorURL(string $facilitatorURL): self
    {
        $self = clone $this;
        $self['facilitatorURL'] = $facilitatorURL;

        return $self;
    }

    /**
     * EIP-712 domain name (e.g. "USD Coin").
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withQuoteID(string $quoteID): self
    {
        $self = clone $this;
        $self['quoteID'] = $quoteID;

        return $self;
    }

    /**
     * EIP-712 domain version.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
