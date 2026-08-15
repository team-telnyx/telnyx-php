<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse\Data\DeletionStatus;

/**
 * @phpstan-type DataShape = array{
 *   deletionStatus: DeletionStatus|value-of<DeletionStatus>,
 *   meetingSessionID: string,
 *   provider: 'recall',
 *   scope: 'provider_recording_media',
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var 'recall' $provider */
    #[Required]
    public string $provider = 'recall';

    /** @var 'provider_recording_media' $scope */
    #[Required]
    public string $scope = 'provider_recording_media';

    /** @var value-of<DeletionStatus> $deletionStatus */
    #[Required('deletion_status', enum: DeletionStatus::class)]
    public string $deletionStatus;

    /**
     * The account-scoped Meeting Session identifier.
     */
    #[Required('meeting_session_id')]
    public string $meetingSessionID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(deletionStatus: ..., meetingSessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withDeletionStatus(...)->withMeetingSessionID(...)
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
     * @param DeletionStatus|value-of<DeletionStatus> $deletionStatus
     */
    public static function with(
        DeletionStatus|string $deletionStatus,
        string $meetingSessionID
    ): self {
        $self = new self;

        $self['deletionStatus'] = $deletionStatus;
        $self['meetingSessionID'] = $meetingSessionID;

        return $self;
    }

    /**
     * @param DeletionStatus|value-of<DeletionStatus> $deletionStatus
     */
    public function withDeletionStatus(
        DeletionStatus|string $deletionStatus
    ): self {
        $self = clone $this;
        $self['deletionStatus'] = $deletionStatus;

        return $self;
    }

    /**
     * The account-scoped Meeting Session identifier.
     */
    public function withMeetingSessionID(string $meetingSessionID): self
    {
        $self = clone $this;
        $self['meetingSessionID'] = $meetingSessionID;

        return $self;
    }

    /**
     * @param 'recall' $provider
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * @param 'provider_recording_media' $scope
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}
