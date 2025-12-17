<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\HoldMethod;

/**
 * Updates a conference participant.
 *
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::update()
 *
 * @phpstan-type ParticipantUpdateParamsShape = array{
 *   accountSid: string,
 *   conferenceSid: string,
 *   announceMethod?: null|AnnounceMethod|value-of<AnnounceMethod>,
 *   announceURL?: string|null,
 *   beepOnExit?: bool|null,
 *   callSidToCoach?: string|null,
 *   coaching?: bool|null,
 *   endConferenceOnExit?: bool|null,
 *   hold?: bool|null,
 *   holdMethod?: null|HoldMethod|value-of<HoldMethod>,
 *   holdURL?: string|null,
 *   muted?: bool|null,
 *   waitURL?: string|null,
 * }
 */
final class ParticipantUpdateParams implements BaseModel
{
    /** @use SdkModel<ParticipantUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    #[Required]
    public string $conferenceSid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $announceMethod
     */
    #[Optional('AnnounceMethod', enum: AnnounceMethod::class)]
    public ?string $announceMethod;

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Optional('AnnounceUrl')]
    public ?string $announceURL;

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    #[Optional('BeepOnExit')]
    public ?bool $beepOnExit;

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    #[Optional('CallSidToCoach')]
    public ?string $callSidToCoach;

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    #[Optional('Coaching')]
    public ?bool $coaching;

    /**
     * Whether to end the conference when the participant leaves.
     */
    #[Optional('EndConferenceOnExit')]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant should be on hold.
     */
    #[Optional('Hold')]
    public ?bool $hold;

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @var value-of<HoldMethod>|null $holdMethod
     */
    #[Optional('HoldMethod', enum: HoldMethod::class)]
    public ?string $holdMethod;

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Optional('HoldUrl')]
    public ?string $holdURL;

    /**
     * Whether the participant should be muted.
     */
    #[Optional('Muted')]
    public ?bool $muted;

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    #[Optional('WaitUrl')]
    public ?string $waitURL;

    /**
     * `new ParticipantUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantUpdateParams::with(accountSid: ..., conferenceSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipantUpdateParams)->withAccountSid(...)->withConferenceSid(...)
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
     *
     * @param AnnounceMethod|value-of<AnnounceMethod>|null $announceMethod
     * @param HoldMethod|value-of<HoldMethod>|null $holdMethod
     */
    public static function with(
        string $accountSid,
        string $conferenceSid,
        AnnounceMethod|string|null $announceMethod = null,
        ?string $announceURL = null,
        ?bool $beepOnExit = null,
        ?string $callSidToCoach = null,
        ?bool $coaching = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        HoldMethod|string|null $holdMethod = null,
        ?string $holdURL = null,
        ?bool $muted = null,
        ?string $waitURL = null,
    ): self {
        $self = new self;

        $self['accountSid'] = $accountSid;
        $self['conferenceSid'] = $conferenceSid;

        null !== $announceMethod && $self['announceMethod'] = $announceMethod;
        null !== $announceURL && $self['announceURL'] = $announceURL;
        null !== $beepOnExit && $self['beepOnExit'] = $beepOnExit;
        null !== $callSidToCoach && $self['callSidToCoach'] = $callSidToCoach;
        null !== $coaching && $self['coaching'] = $coaching;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $hold && $self['hold'] = $hold;
        null !== $holdMethod && $self['holdMethod'] = $holdMethod;
        null !== $holdURL && $self['holdURL'] = $holdURL;
        null !== $muted && $self['muted'] = $muted;
        null !== $waitURL && $self['waitURL'] = $waitURL;

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

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod
    ): self {
        $self = clone $this;
        $self['announceMethod'] = $announceMethod;

        return $self;
    }

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $self = clone $this;
        $self['announceURL'] = $announceURL;

        return $self;
    }

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    public function withBeepOnExit(bool $beepOnExit): self
    {
        $self = clone $this;
        $self['beepOnExit'] = $beepOnExit;

        return $self;
    }

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    public function withCallSidToCoach(string $callSidToCoach): self
    {
        $self = clone $this;
        $self['callSidToCoach'] = $callSidToCoach;

        return $self;
    }

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    public function withCoaching(bool $coaching): self
    {
        $self = clone $this;
        $self['coaching'] = $coaching;

        return $self;
    }

    /**
     * Whether to end the conference when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * Whether the participant should be on hold.
     */
    public function withHold(bool $hold): self
    {
        $self = clone $this;
        $self['hold'] = $hold;

        return $self;
    }

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @param HoldMethod|value-of<HoldMethod> $holdMethod
     */
    public function withHoldMethod(HoldMethod|string $holdMethod): self
    {
        $self = clone $this;
        $self['holdMethod'] = $holdMethod;

        return $self;
    }

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withHoldURL(string $holdURL): self
    {
        $self = clone $this;
        $self['holdURL'] = $holdURL;

        return $self;
    }

    /**
     * Whether the participant should be muted.
     */
    public function withMuted(bool $muted): self
    {
        $self = clone $this;
        $self['muted'] = $muted;

        return $self;
    }

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    public function withWaitURL(string $waitURL): self
    {
        $self = clone $this;
        $self['waitURL'] = $waitURL;

        return $self;
    }
}
