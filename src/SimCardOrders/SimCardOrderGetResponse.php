<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrder\Cost;
use Telnyx\SimCardOrders\SimCardOrder\OrderAddress;
use Telnyx\SimCardOrders\SimCardOrder\Status;

/**
 * @phpstan-type SimCardOrderGetResponseShape = array{data?: SimCardOrder|null}
 */
final class SimCardOrderGetResponse implements BaseModel
{
    /** @use SdkModel<SimCardOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SimCardOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardOrder|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   createdAt?: string|null,
     *   orderAddress?: OrderAddress|null,
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   trackingURL?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(SimCardOrder|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SimCardOrder|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   createdAt?: string|null,
     *   orderAddress?: OrderAddress|null,
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   trackingURL?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(SimCardOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
