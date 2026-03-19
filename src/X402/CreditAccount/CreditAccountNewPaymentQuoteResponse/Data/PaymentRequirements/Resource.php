<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse\Data\PaymentRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The resource being paid for. Included in the payment signature.
 *
 * @phpstan-type ResourceShape = array{
 *   description?: string|null, mimeType?: string|null, url?: string|null
 * }
 */
final class Resource implements BaseModel
{
    /** @use SdkModel<ResourceShape> */
    use SdkModel;

    /**
     * Human-readable description of the payment.
     */
    #[Optional]
    public ?string $description;

    /**
     * MIME type of the resource.
     */
    #[Optional]
    public ?string $mimeType;

    /**
     * Canonical URL of the payment resource.
     */
    #[Optional]
    public ?string $url;

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
        ?string $description = null,
        ?string $mimeType = null,
        ?string $url = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $mimeType && $self['mimeType'] = $mimeType;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Human-readable description of the payment.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * MIME type of the resource.
     */
    public function withMimeType(string $mimeType): self
    {
        $self = clone $this;
        $self['mimeType'] = $mimeType;

        return $self;
    }

    /**
     * Canonical URL of the payment resource.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
