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
 * @see Telnyx\Rooms->retrieve
 *
 * @phpstan-type RoomRetrieveParamsShape = array{includeSessions?: bool}
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
    public ?bool $includeSessions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeSessions = null): self
    {
        $obj = new self;

        null !== $includeSessions && $obj->includeSessions = $includeSessions;

        return $obj;
    }

    /**
     * To decide if room sessions should be included in the response.
     */
    public function withIncludeSessions(bool $includeSessions): self
    {
        $obj = clone $this;
        $obj->includeSessions = $includeSessions;

        return $obj;
    }
}
