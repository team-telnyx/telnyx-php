<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id].
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\Recordings\RecordingListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   conferenceID?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   from?: string|null,
 *   sipCallID?: string|null,
 *   to?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

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
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

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
     * @param CreatedAtShape $createdAt
     */
    public static function with(
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $conferenceID = null,
        ?string $connectionID = null,
        CreatedAt|array|null $createdAt = null,
        ?string $from = null,
        ?string $sipCallID = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $from && $self['from'] = $from;
        null !== $sipCallID && $self['sipCallID'] = $sipCallID;
        null !== $to && $self['to'] = $to;

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
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * @param CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * If present, recordings will be filtered to those with a matching `to` attribute (case-sensitive).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
