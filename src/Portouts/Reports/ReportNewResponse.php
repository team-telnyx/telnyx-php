<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\PortoutReport\ReportType;
use Telnyx\Portouts\Reports\PortoutReport\Status;

/**
 * @phpstan-type ReportNewResponseShape = array{data?: PortoutReport|null}
 */
final class ReportNewResponse implements BaseModel
{
    /** @use SdkModel<ReportNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     * @param PortoutReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(PortoutReport|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortoutReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortoutReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
