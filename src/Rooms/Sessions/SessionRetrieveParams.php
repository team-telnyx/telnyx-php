<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * View a room session.
 *
 * @see Telnyx\Rooms\Sessions->retrieve
 *
 * @phpstan-type SessionRetrieveParamsShape = array{includeParticipants?: bool}
 */
final class SessionRetrieveParams implements BaseModel
{
    /** @use SdkModel<SessionRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * To decide if room participants should be included in the response.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $includeParticipants && $obj->includeParticipants = $includeParticipants;

        return $obj;
    }

    /**
     * To decide if room participants should be included in the response.
     */
    public function withIncludeParticipants(bool $includeParticipants): self
    {
        $obj = clone $this;
        $obj->includeParticipants = $includeParticipants;

        return $obj;
    }
}
