<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta705dfa7312;

/**
 * @phpstan-import-type CdrDetailedReqResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\CdrDetailedReqResponse
 * @phpstan-import-type BatchCsvPaginationMeta705dfa7312Shape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta705dfa7312
 *
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrDetailedReqResponse|CdrDetailedReqResponseShape>|null,
 *   meta?: null|BatchCsvPaginationMeta705dfa7312|BatchCsvPaginationMeta705dfa7312Shape,
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
     * @param list<CdrDetailedReqResponse|CdrDetailedReqResponseShape>|null $data
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
     * @param list<CdrDetailedReqResponse|CdrDetailedReqResponseShape> $data
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
