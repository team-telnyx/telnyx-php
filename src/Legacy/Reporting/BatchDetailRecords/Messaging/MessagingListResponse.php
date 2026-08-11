<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MdrDetailReportResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse
 * @phpstan-import-type BatchCsvPaginationMeta705dfa7312Shape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta705dfa7312
 *
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<MdrDetailReportResponse|MdrDetailReportResponseShape>|null,
 *   meta?: null|BatchCsvPaginationMeta705dfa7312|BatchCsvPaginationMeta705dfa7312Shape,
 * }
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    /** @var list<MdrDetailReportResponse>|null $data */
    #[Optional(list: MdrDetailReportResponse::class)]
    public ?array $data;

    #[Optional]
    public ?BatchCsvPaginationMeta705dfa7312 $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrDetailReportResponse|MdrDetailReportResponseShape>|null $data
     * @param BatchCsvPaginationMeta705dfa7312|BatchCsvPaginationMeta705dfa7312Shape|null $meta
     */
    public static function with(
        ?array $data = null,
        BatchCsvPaginationMeta705dfa7312|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MdrDetailReportResponse|MdrDetailReportResponseShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param BatchCsvPaginationMeta705dfa7312|BatchCsvPaginationMeta705dfa7312Shape $meta
     */
    public function withMeta(BatchCsvPaginationMeta705dfa7312|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
