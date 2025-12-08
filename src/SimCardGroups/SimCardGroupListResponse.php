<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupListResponse\Data;
use Telnyx\SimCardGroups\SimCardGroupListResponse\Data\DataLimit;

/**
 * @phpstan-type SimCardGroupListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardGroupListResponse implements BaseModel
{
    /** @use SdkModel<SimCardGroupListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   consumed_data?: ConsumedData|null,
     *   created_at?: string|null,
     *   data_limit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   private_wireless_gateway_id?: string|null,
     *   record_type?: string|null,
     *   sim_card_count?: int|null,
     *   updated_at?: string|null,
     *   wireless_blocklist_id?: string|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   consumed_data?: ConsumedData|null,
     *   created_at?: string|null,
     *   data_limit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   private_wireless_gateway_id?: string|null,
     *   record_type?: string|null,
     *   sim_card_count?: int|null,
     *   updated_at?: string|null,
     *   wireless_blocklist_id?: string|null,
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
