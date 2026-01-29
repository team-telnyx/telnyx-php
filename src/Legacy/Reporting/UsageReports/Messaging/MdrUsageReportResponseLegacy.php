<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Legacy V2 MDR usage report response.
 *
 * @phpstan-type MdrUsageReportResponseLegacyShape = array{
 *   id?: string|null,
 *   aggregationType?: int|null,
 *   connections?: list<string>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endTime?: \DateTimeInterface|null,
 *   profiles?: list<string>|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: array<string,mixed>|null,
 *   startTime?: \DateTimeInterface|null,
 *   status?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class MdrUsageReportResponseLegacy implements BaseModel
{
    /** @use SdkModel<MdrUsageReportResponseLegacyShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    #[Optional('aggregation_type')]
    public ?int $aggregationType;

    /** @var list<string>|null $connections */
    #[Optional(list: 'string')]
    public ?array $connections;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * List of messaging profile IDs.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('report_url')]
    public ?string $reportURL;

    /** @var array<string,mixed>|null $result */
    #[Optional(map: 'mixed')]
    public ?array $result;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    #[Optional]
    public ?int $status;

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
     * @param list<string>|null $connections
     * @param list<string>|null $profiles
     * @param array<string,mixed>|null $result
     */
    public static function with(
        ?string $id = null,
        ?int $aggregationType = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endTime = null,
        ?array $profiles = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        ?array $result = null,
        ?\DateTimeInterface $startTime = null,
        ?int $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $profiles && $self['profiles'] = $profiles;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $result && $self['result'] = $result;
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
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * @param list<string> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * List of messaging profile IDs.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

        return $self;
    }

    /**
     * @param array<string,mixed> $result
     */
    public function withResult(array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    public function withStatus(int $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
