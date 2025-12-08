<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Filters;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Status;

/**
 * @phpstan-type SubNumberOrdersReportNewResponseShape = array{data?: Data|null}
 */
final class SubNumberOrdersReportNewResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrdersReportNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   filters?: Filters|null,
     *   order_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   filters?: Filters|null,
     *   order_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
