<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: GlobalIPAssignment::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   global_ip_id?: string|null,
     *   is_announced?: bool|null,
     *   is_connected?: bool|null,
     *   is_in_maintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguard_peer_id?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   global_ip_id?: string|null,
     *   is_announced?: bool|null,
     *   is_connected?: bool|null,
     *   is_in_maintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguard_peer_id?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
