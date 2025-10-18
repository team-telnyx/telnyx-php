<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\StandardPaginationMeta;

/**
 * @phpstan-type voice_list_response = array{
 *   data?: list<CdrUsageReportResponseLegacy>, meta?: StandardPaginationMeta
 * }
 */
final class VoiceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<voice_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CdrUsageReportResponseLegacy>|null $data */
    #[Api(list: CdrUsageReportResponseLegacy::class, optional: true)]
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
     * @param list<CdrUsageReportResponseLegacy> $data
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
     * @param list<CdrUsageReportResponseLegacy> $data
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
