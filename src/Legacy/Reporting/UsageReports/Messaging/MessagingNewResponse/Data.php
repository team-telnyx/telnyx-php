<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Legacy V2 MDR usage report response.
 *
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   aggregationType?: int,
 *   connections?: list<int>,
 *   createdAt?: \DateTimeInterface,
 *   endTime?: \DateTimeInterface,
 *   profiles?: list<string>,
 *   recordType?: string,
 *   reportURL?: string,
 *   result?: mixed,
 *   startTime?: \DateTimeInterface,
 *   status?: int,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    #[Api('aggregation_type', optional: true)]
    public ?int $aggregationType;

    /** @var list<int>|null $connections */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('end_time', optional: true)]
    public ?\DateTimeInterface $endTime;

    /**
     * List of messaging profile IDs.
     *
     * @var list<string>|null $profiles
     */
    #[Api(list: 'string', optional: true)]
    public ?array $profiles;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('report_url', optional: true)]
    public ?string $reportURL;

    #[Api(optional: true)]
    public mixed $result;

    #[Api('start_time', optional: true)]
    public ?\DateTimeInterface $startTime;

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    #[Api(optional: true)]
    public ?int $status;

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
     * @param list<int> $connections
     * @param list<string> $profiles
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
        mixed $result = null,
        ?\DateTimeInterface $startTime = null,
        ?int $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $aggregationType && $obj->aggregationType = $aggregationType;
        null !== $connections && $obj->connections = $connections;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $result && $obj->result = $result;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status;
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
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj->aggregationType = $aggregationType;

        return $obj;
    }

    /**
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj->connections = $connections;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * List of messaging profile IDs.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $obj = clone $this;
        $obj->profiles = $profiles;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

        return $obj;
    }

    public function withResult(mixed $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
