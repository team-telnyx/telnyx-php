<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id].
 *
 * @phpstan-type FilterShape = array{
 *   callLegID?: string,
 *   callSessionID?: string,
 *   conferenceID?: string,
 *   connectionID?: string,
 *   createdAt?: CreatedAt,
 *   from?: string,
 *   sipCallID?: string,
 *   to?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, recordings will be filtered to those with a matching call_leg_id.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * Returns only recordings associated with a given conference.
     */
    #[Api('conference_id', optional: true)]
    public ?string $conferenceID;

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * If present, recordings will be filtered to those with a matching `from` attribute (case-sensitive).
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * If present, recordings will be filtered to those with a matching `sip_call_id` attribute. Matching is case-sensitive.
     */
    #[Api('sip_call_id', optional: true)]
    public ?string $sipCallID;

    /**
     * If present, recordings will be filtered to those with a matching `to` attribute (case-sensitive).
     */
    #[Api(optional: true)]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $conferenceID = null,
        ?string $connectionID = null,
        ?CreatedAt $createdAt = null,
        ?string $from = null,
        ?string $sipCallID = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $conferenceID && $obj->conferenceID = $conferenceID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $from && $obj->from = $from;
        null !== $sipCallID && $obj->sipCallID = $sipCallID;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_leg_id.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Returns only recordings associated with a given conference.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj->conferenceID = $conferenceID;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching `from` attribute (case-sensitive).
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching `sip_call_id` attribute. Matching is case-sensitive.
     */
    public function withSipCallID(string $sipCallID): self
    {
        $obj = clone $this;
        $obj->sipCallID = $sipCallID;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching `to` attribute (case-sensitive).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
