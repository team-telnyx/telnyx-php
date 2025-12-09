<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Can be specified directly or via the `requirement_group_id` parameter.
 *
 * @phpstan-type PortingOrderDocumentsShape = array{
 *   invoice?: string|null, loa?: string|null
 * }
 */
final class PortingOrderDocuments implements BaseModel
{
    /** @use SdkModel<PortingOrderDocumentsShape> */
    use SdkModel;

    /**
     * Returned ID of the submitted Invoice via the Documents endpoint.
     */
    #[Optional(nullable: true)]
    public ?string $invoice;

    /**
     * Returned ID of the submitted LOA via the Documents endpoint.
     */
    #[Optional(nullable: true)]
    public ?string $loa;

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
        ?string $invoice = null,
        ?string $loa = null
    ): self {
        $self = new self;

        null !== $invoice && $self['invoice'] = $invoice;
        null !== $loa && $self['loa'] = $loa;

        return $self;
    }

    /**
     * Returned ID of the submitted Invoice via the Documents endpoint.
     */
    public function withInvoice(?string $invoice): self
    {
        $self = clone $this;
        $self['invoice'] = $invoice;

        return $self;
    }

    /**
     * Returned ID of the submitted LOA via the Documents endpoint.
     */
    public function withLoa(?string $loa): self
    {
        $self = clone $this;
        $self['loa'] = $loa;

        return $self;
    }
}
