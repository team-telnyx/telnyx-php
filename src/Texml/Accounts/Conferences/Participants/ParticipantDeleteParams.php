<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ParticipantDeleteParams); // set properties as needed
 * $client->texml.accounts.conferences.participants->delete(...$params->toArray());
 * ```
 * Deletes a conference participant.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.conferences.participants->delete(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Conferences\Participants->delete
 *
 * @phpstan-type participant_delete_params = array{
 *   accountSid: string, conferenceSid: string
 * }
 */
final class ParticipantDeleteParams implements BaseModel
{
    /** @use SdkModel<participant_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $conferenceSid;

    /**
     * `new ParticipantDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantDeleteParams::with(accountSid: ..., conferenceSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipantDeleteParams)->withAccountSid(...)->withConferenceSid(...)
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
     */
    public static function with(string $accountSid, string $conferenceSid): self
    {
        $obj = new self;

        $obj->accountSid = $accountSid;
        $obj->conferenceSid = $conferenceSid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withConferenceSid(string $conferenceSid): self
    {
        $obj = clone $this;
        $obj->conferenceSid = $conferenceSid;

        return $obj;
    }
}
