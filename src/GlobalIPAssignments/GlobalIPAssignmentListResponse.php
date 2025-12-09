<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type GlobalIPAssignmentListResponseShape = array{
 *   data?: list<GlobalIPAssignment>|null, meta?: PaginationMeta|null
 * }
 */
final class GlobalIPAssignmentListResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentListResponseShape> */
    use SdkModel;

    /** @var list<GlobalIPAssignment>|null $data */
    #[Optional(list: GlobalIPAssignment::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<GlobalIPAssignment|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   isAnnounced?: bool|null,
     *   isConnected?: bool|null,
     *   isInMaintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguardPeerID?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<GlobalIPAssignment|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   isAnnounced?: bool|null,
     *   isConnected?: bool|null,
     *   isInMaintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguardPeerID?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
