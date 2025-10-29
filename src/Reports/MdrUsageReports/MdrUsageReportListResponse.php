<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MdrUsageReportListResponseShape = array{
 *   data?: list<MdrUsageReport>, meta?: PaginationMetaReporting
 * }
 */
final class MdrUsageReportListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MdrUsageReportListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MdrUsageReport>|null $data */
    #[Api(list: MdrUsageReport::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMetaReporting $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrUsageReport> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMetaReporting $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MdrUsageReport> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMetaReporting $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
