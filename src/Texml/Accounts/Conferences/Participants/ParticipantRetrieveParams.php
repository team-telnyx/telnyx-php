<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Gets conference participant resource.
 *
 * @see Telnyx\Texml\Accounts\Conferences\Participants->retrieve
 *
 * @phpstan-type participant_retrieve_params = array{
 *   accountSid: string, conferenceSid: string
 * }
 */
final class ParticipantRetrieveParams implements BaseModel
{
    /** @use SdkModel<participant_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $conferenceSid;

    /**
     * `new ParticipantRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantRetrieveParams::with(accountSid: ..., conferenceSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipantRetrieveParams)->withAccountSid(...)->withConferenceSid(...)
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
