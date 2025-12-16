<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TelcoDataUsageReportResponseShape from \Telnyx\Legacy\Reporting\UsageReports\NumberLookup\TelcoDataUsageReportResponse
 *
 * @phpstan-type NumberLookupNewResponseShape = array{
 *   data?: null|TelcoDataUsageReportResponse|TelcoDataUsageReportResponseShape
 * }
 */
final class NumberLookupNewResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupNewResponseShape> */
    use SdkModel;

    /**
     * Telco data usage report response.
     */
    #[Optional]
    public ?TelcoDataUsageReportResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelcoDataUsageReportResponseShape $data
     */
    public static function with(
        TelcoDataUsageReportResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Telco data usage report response.
     *
     * @param TelcoDataUsageReportResponseShape $data
     */
    public function withData(TelcoDataUsageReportResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
