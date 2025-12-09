<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SttDetailReportResponse\Status;

/**
 * @phpstan-type SttDetailReportResponseShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   downloadLink?: string|null,
 *   endDate?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   startDate?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class SttDetailReportResponse implements BaseModel
{
    /** @use SdkModel<SttDetailReportResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * URL to download the report.
     */
    #[Optional('download_link')]
    public ?string $downloadLink;

    #[Optional('end_date')]
    public ?\DateTimeInterface $endDate;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('start_date')]
    public ?\DateTimeInterface $startDate;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
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

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $downloadLink && $obj['downloadLink'] = $downloadLink;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $startDate && $obj['startDate'] = $startDate;
        null !== $status && $obj['status'] = $status;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * URL to download the report.
     */
    public function withDownloadLink(string $downloadLink): self
    {
        $obj = clone $this;
        $obj['downloadLink'] = $downloadLink;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

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
