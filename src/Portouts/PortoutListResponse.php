<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Metadata;
use Telnyx\Portouts\PortoutDetails\Status;

/**
 * @phpstan-type PortoutListResponseShape = array{
 *   data?: list<PortoutDetails>|null, meta?: Metadata|null
 * }
 */
final class PortoutListResponse implements BaseModel
{
    /** @use SdkModel<PortoutListResponseShape> */
    use SdkModel;

    /** @var list<PortoutDetails>|null $data */
    #[Optional(list: PortoutDetails::class)]
    public ?array $data;

    #[Optional]
    public ?Metadata $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortoutDetails|array{
     *   id?: string|null,
     *   alreadyPorted?: bool|null,
     *   authorizedName?: string|null,
     *   carrierName?: string|null,
     *   city?: string|null,
     *   createdAt?: string|null,
     *   currentCarrier?: string|null,
     *   endUserName?: string|null,
     *   focDate?: string|null,
     *   hostMessaging?: bool|null,
     *   insertedAt?: string|null,
     *   lsr?: list<string>|null,
     *   phoneNumbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     *   rejectionCode?: int|null,
     *   requestedFocDate?: string|null,
     *   serviceAddress?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   supportKey?: string|null,
     *   updatedAt?: string|null,
     *   userID?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * }> $data
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<PortoutDetails|array{
     *   id?: string|null,
     *   alreadyPorted?: bool|null,
     *   authorizedName?: string|null,
     *   carrierName?: string|null,
     *   city?: string|null,
     *   createdAt?: string|null,
     *   currentCarrier?: string|null,
     *   endUserName?: string|null,
     *   focDate?: string|null,
     *   hostMessaging?: bool|null,
     *   insertedAt?: string|null,
     *   lsr?: list<string>|null,
     *   phoneNumbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     *   rejectionCode?: int|null,
     *   requestedFocDate?: string|null,
     *   serviceAddress?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   supportKey?: string|null,
     *   updatedAt?: string|null,
     *   userID?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
