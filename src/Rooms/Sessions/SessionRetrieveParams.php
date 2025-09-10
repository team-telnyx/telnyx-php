<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SessionRetrieveParams); // set properties as needed
 * $client->rooms.sessions->retrieve(...$params->toArray());
 * ```
 * View a room session.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->rooms.sessions->retrieve(...$params->toArray());`
 *
 * @see Telnyx\Rooms\Sessions->retrieve
 *
 * @phpstan-type session_retrieve_params = array{includeParticipants?: bool}
 */
final class SessionRetrieveParams implements BaseModel
{
    /** @use SdkModel<session_retrieve_params> */
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
