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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $downloadLink && $self['downloadLink'] = $downloadLink;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $status && $self['status'] = $status;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * URL to download the report.
     */
    public function withDownloadLink(string $downloadLink): self
    {
        $self = clone $this;
        $self['downloadLink'] = $downloadLink;

        return $self;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
