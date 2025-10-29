<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SttDetailReportResponse\Status;

/**
 * @phpstan-type SttDetailReportResponseShape = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   downloadLink?: string,
 *   endDate?: \DateTimeInterface,
 *   recordType?: string,
 *   startDate?: \DateTimeInterface,
 *   status?: value-of<Status>,
 * }
 */
final class SttDetailReportResponse implements BaseModel
{
    /** @use SdkModel<SttDetailReportResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * URL to download the report.
     */
    #[Api('download_link', optional: true)]
    public ?string $downloadLink;

    #[Api('end_date', optional: true)]
    public ?\DateTimeInterface $endDate;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('start_date', optional: true)]
    public ?\DateTimeInterface $startDate;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

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
        ?\DateTimeInterface $createdAt = null,
        ?string $downloadLink = null,
        ?\DateTimeInterface $endDate = null,
        ?string $recordType = null,
        ?\DateTimeInterface $startDate = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $downloadLink && $obj->downloadLink = $downloadLink;
        null !== $endDate && $obj->endDate = $endDate;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $startDate && $obj->startDate = $startDate;
        null !== $status && $obj['status'] = $status;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * URL to download the report.
     */
    public function withDownloadLink(string $downloadLink): self
    {
        $obj = clone $this;
        $obj->downloadLink = $downloadLink;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
