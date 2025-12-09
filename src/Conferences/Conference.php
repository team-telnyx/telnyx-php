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
 * @phpstan-type ConferenceShape = array{
 *   id: string,
 *   createdAt: string,
 *   expiresAt: string,
 *   name: string,
 *   recordType: value-of<RecordType>,
 *   connectionID?: string|null,
 *   endReason?: value-of<EndReason>|null,
 *   endedBy?: EndedBy|null,
 *   region?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param EndedBy|array{
     *   callControlID?: string|null, callSessionID?: string|null
     * } $endedBy
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['expiresAt'] = $expiresAt;
        $obj['name'] = $name;
        $obj['recordType'] = $recordType;

        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $endReason && $obj['endReason'] = $endReason;
        null !== $endedBy && $obj['endedBy'] = $endedBy;
        null !== $region && $obj['region'] = $region;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the conference.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the conference was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the conference will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the connection associated with the conference.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Reason why the conference ended.
     *
     * @param EndReason|value-of<EndReason> $endReason
     */
    public function withEndReason(EndReason|string $endReason): self
    {
        $obj = clone $this;
        $obj['endReason'] = $endReason;

        return $obj;
    }

    /**
     * IDs related to who ended the conference. It is expected for them to all be there or all be null.
     *
     * @param EndedBy|array{
     *   callControlID?: string|null, callSessionID?: string|null
     * } $endedBy
     */
    public function withEndedBy(EndedBy|array $endedBy): self
    {
        $obj = clone $this;
        $obj['endedBy'] = $endedBy;

        return $obj;
    }

    /**
     * Region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Status of the conference.
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
     * ISO 8601 formatted date of when the conference was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
