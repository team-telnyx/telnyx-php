<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\PortoutReport\ReportType;
use Telnyx\Portouts\Reports\PortoutReport\Status;

/**
 * @phpstan-type PortoutReportShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   document_id?: string|null,
 *   params?: ExportPortoutsCsvReport|null,
 *   record_type?: string|null,
 *   report_type?: value-of<ReportType>|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortoutReport implements BaseModel
{
    /** @use SdkModel<PortoutReportShape> */
    use SdkModel;

    /**
     * Uniquely identifies the report.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    #[Api(optional: true)]
    public ?string $document_id;

    /**
     * The parameters for generating a port-outs CSV report.
     */
    #[Api(optional: true)]
    public ?ExportPortoutsCsvReport $params;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType>|null $report_type
     */
    #[Api(enum: ReportType::class, optional: true)]
    public ?string $report_type;

    /**
     * The current status of the report generation.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
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
     * @param ReportType|value-of<ReportType> $report_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $document_id = null,
        ?ExportPortoutsCsvReport $params = null,
        ?string $record_type = null,
        ReportType|string|null $report_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $document_id && $obj->document_id = $document_id;
        null !== $params && $obj->params = $params;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $report_type && $obj['report_type'] = $report_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the report.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->document_id = $documentID;

        return $obj;
    }

    /**
     * The parameters for generating a port-outs CSV report.
     */
    public function withParams(ExportPortoutsCsvReport $params): self
    {
        $obj = clone $this;
        $obj->params = $params;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
