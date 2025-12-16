<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Wireless\DetailRecordsReports\WdrReport\Status;

/**
 * @phpstan-type WdrReportShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   endTime?: string|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   startTime?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: string|null,
 * }
 */
final class WdrReport implements BaseModel
{
    /** @use SdkModel<WdrReportShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    #[Optional('end_time')]
    public ?string $endTime;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The URL where the report content, when generated, will be published to.
     */
    #[Optional('report_url')]
    public ?string $reportURL;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * Indicates the status of the report, which is updated asynchronously.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $endTime = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        ?string $startTime = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The URL where the report content, when generated, will be published to.
     */
    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Indicates the status of the report, which is updated asynchronously.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
