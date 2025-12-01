<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
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
    #[Api(nullable: true, optional: true)]
    public ?string $invoice;

    /**
     * Returned ID of the submitted LOA via the Documents endpoint.
     */
    #[Api(nullable: true, optional: true)]
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
        $obj = new self;

        null !== $invoice && $obj->invoice = $invoice;
        null !== $loa && $obj->loa = $loa;

        return $obj;
    }

    /**
     * Returned ID of the submitted Invoice via the Documents endpoint.
     */
    public function withInvoice(?string $invoice): self
    {
        $obj = clone $this;
        $obj->invoice = $invoice;

        return $obj;
    }

    /**
     * Returned ID of the submitted LOA via the Documents endpoint.
     */
    public function withLoa(?string $loa): self
    {
        $obj = clone $this;
        $obj->loa = $loa;

        return $obj;
    }
}
