<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   pending_numbers_count?: int|null, pending_orders_count?: int|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The count of phone numbers that are pending assignment to the external connection.
     */
    #[Optional]
    public ?int $pending_numbers_count;

    /**
     * The count of number uploads that have not yet been uploaded to Microsoft.
     */
    #[Optional]
    public ?int $pending_orders_count;

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
        ?int $pending_numbers_count = null,
        ?int $pending_orders_count = null
    ): self {
        $obj = new self;

        null !== $pending_numbers_count && $obj['pending_numbers_count'] = $pending_numbers_count;
        null !== $pending_orders_count && $obj['pending_orders_count'] = $pending_orders_count;

        return $obj;
    }

    /**
     * The count of phone numbers that are pending assignment to the external connection.
     */
    public function withPendingNumbersCount(int $pendingNumbersCount): self
    {
        $obj = clone $this;
        $obj['pending_numbers_count'] = $pendingNumbersCount;

        return $obj;
    }

    /**
     * The count of number uploads that have not yet been uploaded to Microsoft.
     */
    public function withPendingOrdersCount(int $pendingOrdersCount): self
    {
        $obj = clone $this;
        $obj['pending_orders_count'] = $pendingOrdersCount;

        return $obj;
    }
}
