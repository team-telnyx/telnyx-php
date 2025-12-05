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
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::retrieve()
 *
 * @phpstan-type ParticipantRetrieveParamsShape = array{
 *   account_sid: string, conference_sid: string
 * }
 */
final class ParticipantRetrieveParams implements BaseModel
{
    /** @use SdkModel<ParticipantRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    #[Api]
    public string $conference_sid;

    /**
     * `new ParticipantRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantRetrieveParams::with(account_sid: ..., conference_sid: ...)
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
    public static function with(
        string $account_sid,
        string $conference_sid
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;
        $obj['conference_sid'] = $conference_sid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    public function withConferenceSid(string $conferenceSid): self
    {
        $obj = clone $this;
        $obj['conference_sid'] = $conferenceSid;

        return $obj;
    }
}
