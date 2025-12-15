<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upload hosted number document.
 *
 * @see Telnyx\Services\MessagingHostedNumberOrders\ActionsService::uploadFile()
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
    #[Optional]
    public ?string $bill;

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    #[Optional]
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
        $self = new self;

        null !== $bill && $self['bill'] = $bill;
        null !== $loa && $self['loa'] = $loa;

        return $self;
    }

    /**
     * Must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format.
     */
    public function withBill(string $bill): self
    {
        $self = clone $this;
        $self['bill'] = $bill;

        return $self;
    }

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    public function withLoa(string $loa): self
    {
        $self = clone $this;
        $self['loa'] = $loa;

        return $self;
    }
}
