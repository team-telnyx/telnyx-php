<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * View a room.
 *
 * @see Telnyx\Services\RoomsService::retrieve()
 *
 * @phpstan-type RoomRetrieveParamsShape = array{include_sessions?: bool}
 */
final class RoomRetrieveParams implements BaseModel
{
    /** @use SdkModel<RoomRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * To decide if room sessions should be included in the response.
     */
    #[Api(optional: true)]
    public ?bool $include_sessions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $include_sessions = null): self
    {
        $obj = new self;

        null !== $include_sessions && $obj['include_sessions'] = $include_sessions;

        return $obj;
    }

    /**
     * To decide if room sessions should be included in the response.
     */
    public function withIncludeSessions(bool $includeSessions): self
    {
        $obj = clone $this;
        $obj['include_sessions'] = $includeSessions;

        return $obj;
    }
}
