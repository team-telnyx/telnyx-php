<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type messaging_list_response = array{
 *   data?: list<MdrDetailReportResponse>, meta?: BatchCsvPaginationMeta
 * }
 */
final class MessagingListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<messaging_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MdrDetailReportResponse>|null $data */
    #[Api(list: MdrDetailReportResponse::class, optional: true)]
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
     * @param list<MdrDetailReportResponse> $data
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
     * @param list<MdrDetailReportResponse> $data
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
