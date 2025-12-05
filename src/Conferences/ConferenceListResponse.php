<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Conferences\Conference\EndedBy;
use Telnyx\Conferences\Conference\EndReason;
use Telnyx\Conferences\Conference\RecordType;
use Telnyx\Conferences\Conference\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ConferenceListResponseShape = array{
 *   data?: list<Conference>|null, meta?: PaginationMeta|null
 * }
 */
final class ConferenceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ConferenceListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Conference>|null $data */
    #[Api(list: Conference::class, optional: true)]
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
     * @param list<Conference|array{
     *   id: string,
     *   created_at: string,
     *   expires_at: string,
     *   name: string,
     *   record_type: value-of<RecordType>,
     *   connection_id?: string|null,
     *   end_reason?: value-of<EndReason>|null,
     *   ended_by?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
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
     * @param list<Conference|array{
     *   id: string,
     *   created_at: string,
     *   expires_at: string,
     *   name: string,
     *   record_type: value-of<RecordType>,
     *   connection_id?: string|null,
     *   end_reason?: value-of<EndReason>|null,
     *   ended_by?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
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
