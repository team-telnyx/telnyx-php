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
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    #[Optional('document_id')]
    public ?string $documentID;

    /**
     * The parameters for generating a porting orders CSV report.
     */
    #[Optional]
    public ?ExportPortingOrdersCsvReport $params;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType>|null $reportType
     */
    #[Optional('report_type', enum: ReportType::class)]
    public ?string $reportType;

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
    #[Optional('updated_at')]
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
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     * @param ReportType|value-of<ReportType> $reportType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $documentID = null,
        ExportPortingOrdersCsvReport|array|null $params = null,
        ?string $recordType = null,
        ReportType|string|null $reportType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $documentID && $obj['documentID'] = $documentID;
        null !== $params && $obj['params'] = $params;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $reportType && $obj['reportType'] = $reportType;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the document that was uploaded when report was generated. This field is only populated when the report is under completed status.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj['documentID'] = $documentID;

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
        $obj['recordType'] = $recordType;

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
        $obj['reportType'] = $reportType;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
