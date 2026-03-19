<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\Accept;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\Resource;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\X402Version;

/**
 * x402 protocol v2 payment requirements. Contains all information needed to construct and sign a payment authorization.
 *
 * @phpstan-import-type AcceptShape from \Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\Accept
 * @phpstan-import-type ResourceShape from \Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements\Resource
 *
 * @phpstan-type PaymentRequirementsShape = array{
 *   accepts?: list<Accept|AcceptShape>|null,
 *   resource?: null|Resource|ResourceShape,
 *   x402Version?: null|X402Version|value-of<X402Version>,
 * }
 */
final class PaymentRequirements implements BaseModel
{
    /** @use SdkModel<PaymentRequirementsShape> */
    use SdkModel;

    /**
     * Accepted payment schemes. Currently only the `exact` EVM scheme is supported.
     *
     * @var list<Accept>|null $accepts
     */
    #[Optional(list: Accept::class)]
    public ?array $accepts;

    /**
     * The resource being paid for. Included in the payment signature.
     */
    #[Optional]
    public ?Resource $resource;

    /**
     * x402 protocol version. Currently always 2.
     *
     * @var value-of<X402Version>|null $x402Version
     */
    #[Optional(enum: X402Version::class)]
    public ?int $x402Version;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Accept|AcceptShape>|null $accepts
     * @param resource|ResourceShape|null $resource
     * @param X402Version|value-of<X402Version>|null $x402Version
     */
    public static function with(
        ?array $accepts = null,
        Resource|array|null $resource = null,
        X402Version|int|null $x402Version = null,
    ): self {
        $self = new self;

        null !== $accepts && $self['accepts'] = $accepts;
        null !== $resource && $self['resource'] = $resource;
        null !== $x402Version && $self['x402Version'] = $x402Version;

        return $self;
    }

    /**
     * Accepted payment schemes. Currently only the `exact` EVM scheme is supported.
     *
     * @param list<Accept|AcceptShape> $accepts
     */
    public function withAccepts(array $accepts): self
    {
        $self = clone $this;
        $self['accepts'] = $accepts;

        return $self;
    }

    /**
     * The resource being paid for. Included in the payment signature.
     *
     * @param resource|ResourceShape $resource
     */
    public function withResource(Resource|array $resource): self
    {
        $self = clone $this;
        $self['resource'] = $resource;

        return $self;
    }

    /**
     * x402 protocol version. Currently always 2.
     *
     * @param X402Version|value-of<X402Version> $x402Version
     */
    public function withX402Version(X402Version|int $x402Version): self
    {
        $self = clone $this;
        $self['x402Version'] = $x402Version;

        return $self;
    }
}
