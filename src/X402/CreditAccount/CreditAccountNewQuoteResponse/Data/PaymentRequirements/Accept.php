<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements\Accept\Extra;

/**
 * @phpstan-import-type ExtraShape from \Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements\Accept\Extra
 *
 * @phpstan-type AcceptShape = array{
 *   amount?: string|null,
 *   asset?: string|null,
 *   extra?: null|Extra|ExtraShape,
 *   maxTimeoutSeconds?: int|null,
 *   network?: string|null,
 *   payTo?: string|null,
 *   scheme?: string|null,
 * }
 */
final class Accept implements BaseModel
{
    /** @use SdkModel<AcceptShape> */
    use SdkModel;

    /**
     * Amount in the token's smallest unit.
     */
    #[Optional]
    public ?string $amount;

    /**
     * Token contract address (e.g. USDC on Base).
     */
    #[Optional]
    public ?string $asset;

    /**
     * Additional scheme-specific parameters including EIP-712 domain info and the facilitator URL.
     */
    #[Optional]
    public ?Extra $extra;

    /**
     * Maximum time in seconds before the payment authorization expires.
     */
    #[Optional]
    public ?int $maxTimeoutSeconds;

    /**
     * Blockchain network identifier in CAIP-2 format (e.g. "eip155:8453" for Base).
     */
    #[Optional]
    public ?string $network;

    /**
     * Recipient wallet address.
     */
    #[Optional]
    public ?string $payTo;

    /**
     * Payment scheme (e.g. "exact").
     */
    #[Optional]
    public ?string $scheme;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Extra|ExtraShape|null $extra
     */
    public static function with(
        ?string $amount = null,
        ?string $asset = null,
        Extra|array|null $extra = null,
        ?int $maxTimeoutSeconds = null,
        ?string $network = null,
        ?string $payTo = null,
        ?string $scheme = null,
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $asset && $self['asset'] = $asset;
        null !== $extra && $self['extra'] = $extra;
        null !== $maxTimeoutSeconds && $self['maxTimeoutSeconds'] = $maxTimeoutSeconds;
        null !== $network && $self['network'] = $network;
        null !== $payTo && $self['payTo'] = $payTo;
        null !== $scheme && $self['scheme'] = $scheme;

        return $self;
    }

    /**
     * Amount in the token's smallest unit.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Token contract address (e.g. USDC on Base).
     */
    public function withAsset(string $asset): self
    {
        $self = clone $this;
        $self['asset'] = $asset;

        return $self;
    }

    /**
     * Additional scheme-specific parameters including EIP-712 domain info and the facilitator URL.
     *
     * @param Extra|ExtraShape $extra
     */
    public function withExtra(Extra|array $extra): self
    {
        $self = clone $this;
        $self['extra'] = $extra;

        return $self;
    }

    /**
     * Maximum time in seconds before the payment authorization expires.
     */
    public function withMaxTimeoutSeconds(int $maxTimeoutSeconds): self
    {
        $self = clone $this;
        $self['maxTimeoutSeconds'] = $maxTimeoutSeconds;

        return $self;
    }

    /**
     * Blockchain network identifier in CAIP-2 format (e.g. "eip155:8453" for Base).
     */
    public function withNetwork(string $network): self
    {
        $self = clone $this;
        $self['network'] = $network;

        return $self;
    }

    /**
     * Recipient wallet address.
     */
    public function withPayTo(string $payTo): self
    {
        $self = clone $this;
        $self['payTo'] = $payTo;

        return $self;
    }

    /**
     * Payment scheme (e.g. "exact").
     */
    public function withScheme(string $scheme): self
    {
        $self = clone $this;
        $self['scheme'] = $scheme;

        return $self;
    }
}
