<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta;

/**
 * @phpstan-import-type CdrDetailedReqResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\CdrDetailedReqResponse
 * @phpstan-import-type BatchCsvPaginationMetaShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta
 *
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrDetailedReqResponseShape>|null,
 *   meta?: null|BatchCsvPaginationMeta|BatchCsvPaginationMetaShape,
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
     * @param list<CdrDetailedReqResponseShape> $data
     * @param BatchCsvPaginationMetaShape $meta
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
     * @param list<CdrDetailedReqResponseShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param BatchCsvPaginationMetaShape $meta
     */
    public function withMeta(BatchCsvPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
