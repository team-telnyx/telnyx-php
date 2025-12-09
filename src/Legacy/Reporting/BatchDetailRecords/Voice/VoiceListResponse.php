<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrDetailedReqResponse>|null, meta?: BatchCsvPaginationMeta|null
 * }
 */
final class VoiceListResponse implements BaseModel
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    /** @var list<CdrDetailedReqResponse>|null $data */
    #[Optional(list: CdrDetailedReqResponse::class)]
    public ?array $data;

    #[Optional]
    public ?BatchCsvPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   callTypes?: list<int>|null,
     *   connections?: list<int>|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   filters?: list<Filter>|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<int>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   startTime?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param BatchCsvPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        BatchCsvPaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   callTypes?: list<int>|null,
     *   connections?: list<int>|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   filters?: list<Filter>|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<int>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   startTime?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param BatchCsvPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(BatchCsvPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
