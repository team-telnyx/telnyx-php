<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\RecordType;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\Status;

/**
 * @phpstan-type ledger_billing_group_report = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   organizationID?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   reportURL?: string|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class LedgerBillingGroupReport implements BaseModel
{
    /** @use SdkModel<ledger_billing_group_report> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Uniquely identifies the organization that owns the resource.
     */
    #[Api('organization_id', optional: true)]
    public ?string $organizationID;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * External url of the ledger billing group report, if the status is complete.
     */
    #[Api('report_url', nullable: true, optional: true)]
    public ?string $reportURL;

    /**
     * Status of the ledger billing group report.
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $organizationID = null,
        RecordType|string|null $recordType = null,
        ?string $reportURL = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $organizationID && $obj->organizationID = $organizationID;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the type of resource.
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
     * Uniquely identifies the organization that owns the resource.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organizationID = $organizationID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * External url of the ledger billing group report, if the status is complete.
     */
    public function withReportURL(?string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

        return $obj;
    }

    /**
     * Status of the ledger billing group report.
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
