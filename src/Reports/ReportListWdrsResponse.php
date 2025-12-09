<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
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
final class ReportListWdrsResponse implements BaseModel
{
    /** @use SdkModel<ReportListWdrsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     *   createdAt?: \DateTimeInterface|null,
     *   downlinkData?: DownlinkData|null,
     *   durationSeconds?: float|null,
     *   imsi?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phoneNumber?: string|null,
     *   rate?: Rate|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   simGroupID?: string|null,
     *   simGroupName?: string|null,
     *   uplinkData?: UplinkData|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   createdAt?: \DateTimeInterface|null,
     *   downlinkData?: DownlinkData|null,
     *   durationSeconds?: float|null,
     *   imsi?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phoneNumber?: string|null,
     *   rate?: Rate|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   simGroupID?: string|null,
     *   simGroupName?: string|null,
     *   uplinkData?: UplinkData|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
