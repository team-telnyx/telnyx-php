<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<MdrUsageReportResponseLegacy>|null,
 *   meta?: StandardPaginationMeta|null,
 * }
 */
final class MessagingListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MdrUsageReportResponseLegacy>|null $data */
    #[Api(list: MdrUsageReportResponseLegacy::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?StandardPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrUsageReportResponseLegacy> $data
     */
    public static function with(
        ?array $data = null,
        ?StandardPaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MdrUsageReportResponseLegacy> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(StandardPaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
