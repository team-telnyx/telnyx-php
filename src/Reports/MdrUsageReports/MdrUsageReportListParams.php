<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch all messaging usage reports. Usage reports are aggregated messaging data for specified time period and breakdown.
 *
 * @see Telnyx\Services\Reports\MdrUsageReportsService::list()
 *
 * @phpstan-type MdrUsageReportListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class MdrUsageReportListParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
