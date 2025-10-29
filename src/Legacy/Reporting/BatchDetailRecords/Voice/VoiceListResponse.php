<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrDetailedReqResponse>, meta?: BatchCsvPaginationMeta
 * }
 */
final class VoiceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CdrDetailedReqResponse>|null $data */
    #[Api(list: CdrDetailedReqResponse::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<CdrDetailedReqResponse> $data
     */
    public static function with(
        ?array $data = null,
        ?BatchCsvPaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<CdrDetailedReqResponse> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(BatchCsvPaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
