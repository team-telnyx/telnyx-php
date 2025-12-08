<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * View a room session.
 *
 * @see Telnyx\Services\Rooms\SessionsService::retrieve()
 *
 * @phpstan-type SessionRetrieveParamsShape = array{include_participants?: bool}
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
    public ?bool $include_participants;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $include_participants = null): self
    {
        $obj = new self;

        null !== $include_participants && $obj['include_participants'] = $include_participants;

        return $obj;
    }

    /**
     * To decide if room participants should be included in the response.
     */
    public function withIncludeParticipants(bool $includeParticipants): self
    {
        $obj = clone $this;
        $obj['include_participants'] = $includeParticipants;

        return $obj;
    }
}
