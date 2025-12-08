<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists conference participants.
 *
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::retrieveParticipants()
 *
 * @phpstan-type ParticipantRetrieveParticipantsParamsShape = array{
 *   account_sid: string
 * }
 */
final class ParticipantRetrieveParticipantsParams implements BaseModel
{
    /** @use SdkModel<ParticipantRetrieveParticipantsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * `new ParticipantRetrieveParticipantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantRetrieveParticipantsParams::with(account_sid: ...)
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
    public static function with(string $account_sid): self
    {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }
}
