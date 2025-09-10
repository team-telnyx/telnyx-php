<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\PortingReport\ReportType;
use Telnyx\Porting\Reports\PortingReport\Status;

/**
 * @phpstan-type porting_report = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   documentID?: string|null,
 *   params?: ExportPortingOrdersCsvReport|null,
 *   recordType?: string|null,
 *   reportType?: value-of<ReportType>|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PortingReport implements BaseModel
{
    /** @use SdkModel<porting_report> */
    use SdkModel;

    /**
     * Uniquely identifies the report.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    #[Api('document_id', optional: true)]
    public ?string $documentID;

    /**
     * The parameters for generating a porting orders CSV report.
     */
    #[Api(optional: true)]
    public ?ExportPortingOrdersCsvReport $params;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType>|null $reportType
     */
    #[Api('report_type', enum: ReportType::class, optional: true)]
    public ?string $reportType;

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
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ReportType|value-of<ReportType> $reportType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $documentID = null,
        ?ExportPortingOrdersCsvReport $params = null,
        ?string $recordType = null,
        ReportType|string|null $reportType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $documentID && $obj->documentID = $documentID;
        null !== $params && $obj->params = $params;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $reportType && $obj->reportType = $reportType instanceof ReportType ? $reportType->value : $reportType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->documentID = $documentID;

        return $obj;
    }

    /**
     * The parameters for generating a porting orders CSV report.
     */
    public function withParams(ExportPortingOrdersCsvReport $params): self
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
        $obj->recordType = $recordType;

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
        $obj->reportType = $reportType instanceof ReportType ? $reportType->value : $reportType;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
