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
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   created_at?: CreatedAt|null,
 *   from?: string|null,
 *   sip_call_id?: string|null,
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
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * Returns only recordings associated with a given conference.
     */
    #[Api(optional: true)]
    public ?string $conference_id;

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * If present, recordings will be filtered to those with a matching `from` attribute (case-sensitive).
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * If present, recordings will be filtered to those with a matching `sip_call_id` attribute. Matching is case-sensitive.
     */
    #[Api(optional: true)]
    public ?string $sip_call_id;

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
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $conference_id = null,
        ?string $connection_id = null,
        ?CreatedAt $created_at = null,
        ?string $from = null,
        ?string $sip_call_id = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $conference_id && $obj->conference_id = $conference_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $from && $obj->from = $from;
        null !== $sip_call_id && $obj->sip_call_id = $sip_call_id;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_leg_id.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching call_session_id.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * Returns only recordings associated with a given conference.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj->conference_id = $conferenceID;

        return $obj;
    }

    /**
     * If present, recordings will be filtered to those with a matching `connection_id` attribute (case-sensitive).
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj->sip_call_id = $sipCallID;

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
