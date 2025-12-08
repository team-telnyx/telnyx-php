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
 *   created_at: string,
 *   expires_at: string,
 *   name: string,
 *   record_type: value-of<RecordType>,
 *   connection_id?: string|null,
 *   end_reason?: value-of<EndReason>|null,
 *   ended_by?: EndedBy|null,
 *   region?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: string|null,
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
    #[Required]
    public string $created_at;

    /**
     * ISO 8601 formatted date of when the conference will expire.
     */
    #[Required]
    public string $expires_at;

    /**
     * Name of the conference.
     */
    #[Required]
    public string $name;

    /** @var value-of<RecordType> $record_type */
    #[Required(enum: RecordType::class)]
    public string $record_type;

    /**
     * Identifies the connection associated with the conference.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * Reason why the conference ended.
     *
     * @var value-of<EndReason>|null $end_reason
     */
    #[Optional(enum: EndReason::class)]
    public ?string $end_reason;

    /**
     * IDs related to who ended the conference. It is expected for them to all be there or all be null.
     */
    #[Optional]
    public ?EndedBy $ended_by;

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
    #[Optional]
    public ?string $updated_at;

    /**
     * `new Conference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Conference::with(
     *   id: ..., created_at: ..., expires_at: ..., name: ..., record_type: ...
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param EndReason|value-of<EndReason> $end_reason
     * @param EndedBy|array{
     *   call_control_id?: string|null, call_session_id?: string|null
     * } $ended_by
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $created_at,
        string $expires_at,
        string $name,
        RecordType|string $record_type,
        ?string $connection_id = null,
        EndReason|string|null $end_reason = null,
        EndedBy|array|null $ended_by = null,
        ?string $region = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['expires_at'] = $expires_at;
        $obj['name'] = $name;
        $obj['record_type'] = $record_type;

        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $end_reason && $obj['end_reason'] = $end_reason;
        null !== $ended_by && $obj['ended_by'] = $ended_by;
        null !== $region && $obj['region'] = $region;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the conference will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the connection associated with the conference.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

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
        $obj['end_reason'] = $endReason;

        return $obj;
    }

    /**
     * IDs related to who ended the conference. It is expected for them to all be there or all be null.
     *
     * @param EndedBy|array{
     *   call_control_id?: string|null, call_session_id?: string|null
     * } $endedBy
     */
    public function withEndedBy(EndedBy|array $endedBy): self
    {
        $obj = clone $this;
        $obj['ended_by'] = $endedBy;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
