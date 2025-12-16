<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortoutReportShape from \Telnyx\Portouts\Reports\PortoutReport
 *
 * @phpstan-type ReportGetResponseShape = array{
 *   data?: null|PortoutReport|PortoutReportShape
 * }
 */
final class ReportGetResponse implements BaseModel
{
    /** @use SdkModel<ReportGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortoutReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutReportShape $data
     */
    public static function with(PortoutReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortoutReportShape $data
     */
    public function withData(PortoutReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
