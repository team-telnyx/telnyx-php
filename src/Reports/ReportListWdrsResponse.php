<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Reports\ReportListWdrsResponse\Data;
use Telnyx\Reports\ReportListWdrsResponse\Data\Cost;
use Telnyx\Reports\ReportListWdrsResponse\Data\DownlinkData;
use Telnyx\Reports\ReportListWdrsResponse\Data\Rate;
use Telnyx\Reports\ReportListWdrsResponse\Data\UplinkData;
use Telnyx\Reports\ReportListWdrsResponse\Meta;

/**
 * @phpstan-type ReportListWdrsResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class ReportListWdrsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ReportListWdrsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   created_at?: \DateTimeInterface|null,
     *   downlink_data?: DownlinkData|null,
     *   duration_seconds?: float|null,
     *   imsi?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phone_number?: string|null,
     *   rate?: Rate|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   sim_group_id?: string|null,
     *   sim_group_name?: string|null,
     *   uplink_data?: UplinkData|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   created_at?: \DateTimeInterface|null,
     *   downlink_data?: DownlinkData|null,
     *   duration_seconds?: float|null,
     *   imsi?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phone_number?: string|null,
     *   rate?: Rate|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   sim_group_id?: string|null,
     *   sim_group_name?: string|null,
     *   uplink_data?: UplinkData|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
