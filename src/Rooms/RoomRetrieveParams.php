<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RoomRetrieveParams); // set properties as needed
 * $client->rooms->retrieve(...$params->toArray());
 * ```
 * View a room.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->rooms->retrieve(...$params->toArray());`
 *
 * @see Telnyx\Rooms->retrieve
 *
 * @phpstan-type room_retrieve_params = array{includeSessions?: bool}
 */
final class RoomRetrieveParams implements BaseModel
{
    /** @use SdkModel<room_retrieve_params> */
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
