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
 * $params = (new ParticipantRetrieveParticipantsParams); // set properties as needed
 * $client->texml.accounts.conferences.participants->retrieveParticipants(...$params->toArray());
 * ```
 * Lists conference participants.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.conferences.participants->retrieveParticipants(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Conferences\Participants->retrieveParticipants
 *
 * @phpstan-type participant_retrieve_participants_params = array{
 *   accountSid: string
 * }
 */
final class ParticipantRetrieveParticipantsParams implements BaseModel
{
    /** @use SdkModel<participant_retrieve_participants_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new ParticipantRetrieveParticipantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantRetrieveParticipantsParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipantRetrieveParticipantsParams)->withAccountSid(...)
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
    public static function with(string $accountSid): self
    {
        $obj = new self;

        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }
}
