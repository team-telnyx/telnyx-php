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
     *   already_ported?: bool|null,
     *   authorized_name?: string|null,
     *   carrier_name?: string|null,
     *   city?: string|null,
     *   created_at?: string|null,
     *   current_carrier?: string|null,
     *   end_user_name?: string|null,
     *   foc_date?: string|null,
     *   host_messaging?: bool|null,
     *   inserted_at?: string|null,
     *   lsr?: list<string>|null,
     *   phone_numbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   record_type?: string|null,
     *   rejection_code?: int|null,
     *   requested_foc_date?: string|null,
     *   service_address?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   support_key?: string|null,
     *   updated_at?: string|null,
     *   user_id?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * }> $data
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
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
     *   already_ported?: bool|null,
     *   authorized_name?: string|null,
     *   carrier_name?: string|null,
     *   city?: string|null,
     *   created_at?: string|null,
     *   current_carrier?: string|null,
     *   end_user_name?: string|null,
     *   foc_date?: string|null,
     *   host_messaging?: bool|null,
     *   inserted_at?: string|null,
     *   lsr?: list<string>|null,
     *   phone_numbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   record_type?: string|null,
     *   rejection_code?: int|null,
     *   requested_foc_date?: string|null,
     *   service_address?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   support_key?: string|null,
     *   updated_at?: string|null,
     *   user_id?: string|null,
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
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
