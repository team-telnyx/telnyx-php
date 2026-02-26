<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubNumberOrdersReportShape from \Telnyx\SubNumberOrdersReport\SubNumberOrdersReport
 *
 * @phpstan-type SubNumberOrdersReportNewResponseShape = array{
 *   data?: null|SubNumberOrdersReport|SubNumberOrdersReportShape
 * }
 */
final class SubNumberOrdersReportNewResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrdersReportNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SubNumberOrdersReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SubNumberOrdersReport|SubNumberOrdersReportShape|null $data
     */
    public static function with(SubNumberOrdersReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SubNumberOrdersReport|SubNumberOrdersReportShape $data
     */
    public function withData(SubNumberOrdersReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
