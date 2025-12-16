<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\Conference\EndedBy;
use Telnyx\Conferences\Conference\EndReason;
use Telnyx\Conferences\Conference\RecordType;
use Telnyx\Conferences\Conference\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EndedByShape from \Telnyx\Conferences\Conference\EndedBy
 *
 * @phpstan-type ConferenceShape = array{
 *   id: string,
 *   createdAt: string,
 *   expiresAt: string,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   connectionID?: string|null,
 *   endReason?: null|EndReason|value-of<EndReason>,
 *   endedBy?: null|EndedBy|EndedByShape,
 *   region?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: string|null,
 * }
 */
final class Conference implements BaseModel
{
    /** @use SdkModel<ConferenceShape> */
    use SdkModel;

    /**
     * Uniquely identifies the conference.
     */
    #[Required]
    public string $id;

    /**
     * ISO 8601 formatted date of when the conference was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * ISO 8601 formatted date of when the conference will expire.
     */
    #[Required('expires_at')]
    public string $expiresAt;

    /**
     * Name of the conference.
     */
    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Identifies the connection associated with the conference.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Reason why the conference ended.
     *
     * @var value-of<EndReason>|null $endReason
     */
    #[Optional('end_reason', enum: EndReason::class)]
    public ?string $endReason;

    /**
     * IDs related to who ended the conference. It is expected for them to all be there or all be null.
     */
    #[Optional('ended_by')]
    public ?EndedBy $endedBy;

    /**
     * Region where the conference is hosted.
     */
    #[Optional]
    public ?string $region;

    /**
     * Status of the conference.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date of when the conference was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * `new Conference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Conference::with(
     *   id: ..., createdAt: ..., expiresAt: ..., name: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Conference)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     * ```
     */
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
     * @param EndReason|value-of<EndReason> $endReason
     * @param EndedByShape $endedBy
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $createdAt,
        string $expiresAt,
        string $name,
        RecordType|string $recordType,
        ?string $connectionID = null,
        EndReason|string|null $endReason = null,
        EndedBy|array|null $endedBy = null,
        ?string $region = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['name'] = $name;
        $self['recordType'] = $recordType;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $endReason && $self['endReason'] = $endReason;
        null !== $endedBy && $self['endedBy'] = $endedBy;
        null !== $region && $self['region'] = $region;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the conference.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the conference was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the conference will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identifies the connection associated with the conference.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Reason why the conference ended.
     *
     * @param EndReason|value-of<EndReason> $endReason
     */
    public function withEndReason(EndReason|string $endReason): self
    {
        $self = clone $this;
        $self['endReason'] = $endReason;

        return $self;
    }

    /**
     * IDs related to who ended the conference. It is expected for them to all be there or all be null.
     *
     * @param EndedByShape $endedBy
     */
    public function withEndedBy(EndedBy|array $endedBy): self
    {
        $self = clone $this;
        $self['endedBy'] = $endedBy;

        return $self;
    }

    /**
     * Region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Status of the conference.
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
     * ISO 8601 formatted date of when the conference was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
