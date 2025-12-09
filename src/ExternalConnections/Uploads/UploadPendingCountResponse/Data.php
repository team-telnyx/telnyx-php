<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   pendingNumbersCount?: int|null, pendingOrdersCount?: int|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The count of phone numbers that are pending assignment to the external connection.
     */
    #[Optional('pending_numbers_count')]
    public ?int $pendingNumbersCount;

    /**
     * The count of number uploads that have not yet been uploaded to Microsoft.
     */
    #[Optional('pending_orders_count')]
    public ?int $pendingOrdersCount;

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
        ?int $pendingNumbersCount = null,
        ?int $pendingOrdersCount = null
    ): self {
        $obj = new self;

        null !== $pendingNumbersCount && $obj['pendingNumbersCount'] = $pendingNumbersCount;
        null !== $pendingOrdersCount && $obj['pendingOrdersCount'] = $pendingOrdersCount;

        return $obj;
    }

    /**
     * The count of phone numbers that are pending assignment to the external connection.
     */
    public function withPendingNumbersCount(int $pendingNumbersCount): self
    {
        $obj = clone $this;
        $obj['pendingNumbersCount'] = $pendingNumbersCount;

        return $obj;
    }

    /**
     * The count of number uploads that have not yet been uploaded to Microsoft.
     */
    public function withPendingOrdersCount(int $pendingOrdersCount): self
    {
        $obj = clone $this;
        $obj['pendingOrdersCount'] = $pendingOrdersCount;

        return $obj;
    }
}
