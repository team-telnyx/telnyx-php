<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MeetingSessionShape from \Telnyx\MeetingSessions\MeetingSession
 *
 * @phpstan-type MeetingSessionResponseShape = array{
 *   data: MeetingSession|MeetingSessionShape
 * }
 */
final class MeetingSessionResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionResponseShape> */
    use SdkModel;

    /**
     * Represents a meeting session. All serializer fields are present and required; nullable fields use null when absent. No actor, provider-bot, idempotency, routing, key, or internal fields are exposed.
     */
    #[Required]
    public MeetingSession $data;

    /**
     * `new MeetingSessionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionResponse)->withData(...)
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
     * @param MeetingSession|MeetingSessionShape $data
     */
    public static function with(MeetingSession|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Represents a meeting session. All serializer fields are present and required; nullable fields use null when absent. No actor, provider-bot, idempotency, routing, key, or internal fields are exposed.
     *
     * @param MeetingSession|MeetingSessionShape $data
     */
    public function withData(MeetingSession|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
