<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Portouts\Reports\PortoutReport\ReportType;
use Telnyx\Portouts\Reports\PortoutReport\Status;

/**
 * @phpstan-type ReportListResponseShape = array{
 *   data?: list<PortoutReport>|null, meta?: PaginationMeta|null
 * }
 */
final class ReportListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ReportListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PortoutReport>|null $data */
    #[Api(list: PortoutReport::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortoutReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<PortoutReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   record_type?: string|null,
     *   report_type?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
