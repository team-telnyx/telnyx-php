<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingListParams\Filter\CreatedAt;
use Telnyx\Recordings\RecordingListParams\Filter\EndTime;
use Telnyx\Recordings\RecordingListParams\Filter\StartTime;

/**
 * Filter recordings by various attributes.
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\Recordings\RecordingListParams\Filter\CreatedAt
 * @phpstan-import-type EndTimeShape from \Telnyx\Recordings\RecordingListParams\Filter\EndTime
 * @phpstan-import-type StartTimeShape from \Telnyx\Recordings\RecordingListParams\Filter\StartTime
 *
 * @phpstan-type FilterShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   conferenceID?: string|null,
 *   conferenceRegion?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   endTime?: null|EndTime|EndTimeShape,
 *   from?: string|null,
 *   sipCallID?: string|null,
 *   startTime?: null|StartTime|StartTimeShape,
 *   to?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, recordings will be filtered to those with a matching `call_control_id`.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * If present, recordings will be filtered to those with a matching call_leg_id.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Returns only recordings associated with a given conference.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * If present, recordings will be filtered to those with a matching `conference_region`.
     */
    #[Optional('conference_region')]
    public ?string $conferenceRegion;

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    #[Optional('end_time')]
    public ?EndTime $endTime;

    /**
     * If present, recordings will be filtered to those with a matching `from` attribute (case-sensitive).
     */
    #[Optional]
    public ?string $from;

    /**
     * If present, recordings will be filtered to those with a matching `sip_call_id` attribute. Matching is case-sensitive.
     */
    #[Optional('sip_call_id')]
    public ?string $sipCallID;

    #[Optional('start_time')]
    public ?StartTime $startTime;

    /**
     * If present, recordings will be filtered to those with a matching `to` attribute (case-sensitive).
     */
    #[Optional]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|CreatedAtShape|null $createdAt
     * @param EndTime|EndTimeShape|null $endTime
     * @param StartTime|StartTimeShape|null $startTime
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $conferenceID = null,
        ?string $conferenceRegion = null,
        ?string $connectionID = null,
        CreatedAt|array|null $createdAt = null,
        EndTime|array|null $endTime = null,
        ?string $from = null,
        ?string $sipCallID = null,
        StartTime|array|null $startTime = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $conferenceRegion && $self['conferenceRegion'] = $conferenceRegion;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $from && $self['from'] = $from;
        null !== $sipCallID && $self['sipCallID'] = $sipCallID;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `call_control_id`.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_leg_id.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Returns only recordings associated with a given conference.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $self = clone $this;
        $self['conferenceID'] = $conferenceID;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `conference_region`.
     */
    public function withConferenceRegion(string $conferenceRegion): self
    {
        $self = clone $this;
        $self['conferenceRegion'] = $conferenceRegion;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param EndTime|EndTimeShape $endTime
     */
    public function withEndTime(EndTime|array $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `from` attribute (case-sensitive).
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `sip_call_id` attribute. Matching is case-sensitive.
     */
    public function withSipCallID(string $sipCallID): self
    {
        $self = clone $this;
        $self['sipCallID'] = $sipCallID;

        return $self;
    }

    /**
     * @param StartTime|StartTimeShape $startTime
     */
    public function withStartTime(StartTime|array $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * If present, recordings will be filtered to those with a matching `to` attribute (case-sensitive).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
