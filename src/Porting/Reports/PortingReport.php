<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters;
use Telnyx\Porting\Reports\PortingReport\ReportType;
use Telnyx\Porting\Reports\PortingReport\Status;

/**
 * @phpstan-type PortingReportShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   document_id?: string|null,
 *   params?: ExportPortingOrdersCsvReport|null,
 *   record_type?: string|null,
 *   report_type?: value-of<ReportType>|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortingReport implements BaseModel
{
    /** @use SdkModel<PortingReportShape> */
    use SdkModel;

    /**
     * Uniquely identifies the report.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    #[Optional]
    public ?string $document_id;

    /**
     * The parameters for generating a porting orders CSV report.
     */
    #[Optional]
    public ?ExportPortingOrdersCsvReport $params;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType>|null $report_type
     */
    #[Optional(enum: ReportType::class)]
    public ?string $report_type;

    /**
     * The current status of the report generation.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     * @param ReportType|value-of<ReportType> $report_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $document_id = null,
        ExportPortingOrdersCsvReport|array|null $params = null,
        ?string $record_type = null,
        ReportType|string|null $report_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $document_id && $obj['document_id'] = $document_id;
        null !== $params && $obj['params'] = $params;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $report_type && $obj['report_type'] = $report_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the report.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj['document_id'] = $documentID;

        return $obj;
    }

    /**
     * The parameters for generating a porting orders CSV report.
     *
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     */
    public function withParams(ExportPortingOrdersCsvReport|array $params): self
    {
        $obj = clone $this;
        $obj['params'] = $params;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the type of report.
     *
     * @param ReportType|value-of<ReportType> $reportType
     */
    public function withReportType(ReportType|string $reportType): self
    {
        $obj = clone $this;
        $obj['report_type'] = $reportType;

        return $obj;
    }

    /**
     * The current status of the report generation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
