<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingReportShape from \Telnyx\Porting\Reports\PortingReport
 *
 * @phpstan-type ReportNewResponseShape = array{
 *   data?: null|PortingReport|PortingReportShape
 * }
 */
final class ReportNewResponse implements BaseModel
{
    /** @use SdkModel<ReportNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingReport|PortingReportShape|null $data
     */
    public static function with(PortingReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingReport|PortingReportShape $data
     */
    public function withData(PortingReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
