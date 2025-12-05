<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data\RecordType;

/**
 * @phpstan-type ManagedAccountListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class ManagedAccountListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ManagedAccountListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
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
     * @param list<Data|array{
     *   id: string,
     *   api_user: string,
     *   created_at: string,
     *   email: string,
     *   manager_account_id: string,
     *   record_type: value-of<RecordType>,
     *   updated_at: string,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   organization_name?: string|null,
     *   rollup_billing?: bool|null,
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
     *   id: string,
     *   api_user: string,
     *   created_at: string,
     *   email: string,
     *   manager_account_id: string,
     *   record_type: value-of<RecordType>,
     *   updated_at: string,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   organization_name?: string|null,
     *   rollup_billing?: bool|null,
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
