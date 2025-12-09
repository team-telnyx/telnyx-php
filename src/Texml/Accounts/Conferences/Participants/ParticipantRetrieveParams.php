<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Gets conference participant resource.
 *
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::retrieve()
 *
 * @phpstan-type ParticipantRetrieveParamsShape = array{
 *   accountSid: string, conferenceSid: string
 * }
 */
final class ParticipantRetrieveParams implements BaseModel
{
    /** @use SdkModel<ParticipantRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    #[Required]
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
