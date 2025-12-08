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
 *   created_at?: \DateTimeInterface|null,
 *   download_link?: string|null,
 *   end_date?: \DateTimeInterface|null,
 *   record_type?: string|null,
 *   start_date?: \DateTimeInterface|null,
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

    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * URL to download the report.
     */
    #[Optional]
    public ?string $download_link;

    #[Optional]
    public ?\DateTimeInterface $end_date;

    #[Optional]
    public ?string $record_type;

    #[Optional]
    public ?\DateTimeInterface $start_date;

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
        ?\DateTimeInterface $created_at = null,
        ?string $download_link = null,
        ?\DateTimeInterface $end_date = null,
        ?string $record_type = null,
        ?\DateTimeInterface $start_date = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $download_link && $obj['download_link'] = $download_link;
        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $start_date && $obj['start_date'] = $start_date;
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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * URL to download the report.
     */
    public function withDownloadLink(string $downloadLink): self
    {
        $obj = clone $this;
        $obj['download_link'] = $downloadLink;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

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
