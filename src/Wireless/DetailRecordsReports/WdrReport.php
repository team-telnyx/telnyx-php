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
 *   created_at?: string|null,
 *   end_time?: string|null,
 *   record_type?: string|null,
 *   report_url?: string|null,
 *   start_time?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: string|null,
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
    #[Optional]
    public ?string $created_at;

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    #[Optional]
    public ?string $end_time;

    #[Optional]
    public ?string $record_type;

    /**
     * The URL where the report content, when generated, will be published to.
     */
    #[Optional]
    public ?string $report_url;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Optional]
    public ?string $start_time;

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
    #[Optional]
    public ?string $updated_at;

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
        ?string $created_at = null,
        ?string $end_time = null,
        ?string $record_type = null,
        ?string $report_url = null,
        ?string $start_time = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $report_url && $obj['report_url'] = $report_url;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The URL where the report content, when generated, will be published to.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['report_url'] = $reportURL;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
