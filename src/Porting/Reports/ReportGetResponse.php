<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\PortingReport\ReportType;
use Telnyx\Porting\Reports\PortingReport\Status;

/**
 * @phpstan-type ReportGetResponseShape = array{data?: PortingReport|null}
 */
final class ReportGetResponse implements BaseModel
{
    /** @use SdkModel<ReportGetResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     * @param PortingReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortingOrdersCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(PortingReport|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortingOrdersCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
