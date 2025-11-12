<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upload file required for a messaging hosted number order.
 *
 * @see Telnyx\STAINLESS_FIXME_MessagingHostedNumberOrders\ActionsService::uploadFile()
 *
 * @phpstan-type ActionUploadFileParamsShape = array{bill?: string, loa?: string}
 */
final class ActionUploadFileParams implements BaseModel
{
    /** @use SdkModel<ActionUploadFileParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format.
     */
    #[Api(optional: true)]
    public ?string $bill;

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    #[Api(optional: true)]
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
    public static function with(?string $bill = null, ?string $loa = null): self
    {
        $obj = new self;

        null !== $bill && $obj->bill = $bill;
        null !== $loa && $obj->loa = $loa;

        return $obj;
    }

    /**
     * Must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format.
     */
    public function withBill(string $bill): self
    {
        $obj = clone $this;
        $obj->bill = $bill;

        return $obj;
    }

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    public function withLoa(string $loa): self
    {
        $obj = clone $this;
        $obj->loa = $loa;

        return $obj;
    }
}
