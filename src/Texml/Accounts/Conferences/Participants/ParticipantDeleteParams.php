<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a conference participant.
 *
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::delete()
 *
 * @phpstan-type ParticipantDeleteParamsShape = array{
 *   accountSid: string, conferenceSid: string
 * }
 */
final class ParticipantDeleteParams implements BaseModel
{
    /** @use SdkModel<ParticipantDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    #[Required]
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
        $self = new self;

        $self['accountSid'] = $accountSid;
        $self['conferenceSid'] = $conferenceSid;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withConferenceSid(string $conferenceSid): self
    {
        $self = clone $this;
        $self['conferenceSid'] = $conferenceSid;

        return $self;
    }
}
