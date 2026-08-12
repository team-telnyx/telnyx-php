<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the room session identified by `room_session_id`, including its room, active status, and lifecycle timestamps. Use `include_participants` to include its participant records.
 *
 * @see Telnyx\Services\Rooms\SessionsService::retrieve()
 *
 * @phpstan-type SessionRetrieveParamsShape = array{
 *   includeParticipants?: bool|null
 * }
 */
final class SessionRetrieveParams implements BaseModel
{
    /** @use SdkModel<SessionRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * To decide if room participants should be included in the response.
     */
    #[Optional]
    public ?bool $includeParticipants;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeParticipants = null): self
    {
        $self = new self;

        null !== $includeParticipants && $self['includeParticipants'] = $includeParticipants;

        return $self;
    }

    /**
     * To decide if room participants should be included in the response.
     */
    public function withIncludeParticipants(bool $includeParticipants): self
    {
        $self = clone $this;
        $self['includeParticipants'] = $includeParticipants;

        return $self;
    }
}
