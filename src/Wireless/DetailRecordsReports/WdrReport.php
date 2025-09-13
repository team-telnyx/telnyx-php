<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Wireless\DetailRecordsReports\WdrReport\Status;

/**
 * @phpstan-type wdr_report = array{
 *   id?: string,
 *   createdAt?: string,
 *   endTime?: string,
 *   recordType?: string,
 *   reportURL?: string,
 *   startTime?: string,
 *   status?: value-of<Status>,
 *   updatedAt?: string,
 * }
 */
final class WdrReport implements BaseModel
{
    /** @use SdkModel<wdr_report> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The URL where the report content, when generated, will be published to.
     */
    #[Api('report_url', optional: true)]
    public ?string $reportURL;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    /**
     * Indicates the status of the report, which is updated asynchronously.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The URL where the report content, when generated, will be published to.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Indicates the status of the report, which is updated asynchronously.
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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
