<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MdrUsageReportShape from \Telnyx\Reports\MdrUsageReports\MdrUsageReport
 *
 * @phpstan-type MdrUsageReportGetResponseShape = array{
 *   data?: null|MdrUsageReport|MdrUsageReportShape
 * }
 */
final class MdrUsageReportGetResponse implements BaseModel
{
    /** @use SdkModel<MdrUsageReportGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MdrUsageReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrUsageReport|MdrUsageReportShape|null $data
     */
    public static function with(MdrUsageReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MdrUsageReport|MdrUsageReportShape $data
     */
    public function withData(MdrUsageReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
