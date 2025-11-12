<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
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
 *   account_sid: string,
 *   conference_sid: string,
 *   AnnounceMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\AnnounceMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\AnnounceMethod>,
 *   AnnounceUrl?: string,
 *   BeepOnExit?: bool,
 *   CallSidToCoach?: string,
 *   Coaching?: bool,
 *   EndConferenceOnExit?: bool,
 *   Hold?: bool,
 *   HoldMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\HoldMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\HoldMethod>,
 *   HoldUrl?: string,
 *   Muted?: bool,
 *   WaitUrl?: string,
 * }
 */
final class ParticipantUpdateParams implements BaseModel
{
    /** @use SdkModel<ParticipantUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    #[Api]
    public string $conference_sid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $AnnounceMethod
     */
    #[Api(
        enum: AnnounceMethod::class,
        optional: true,
    )]
    public ?string $AnnounceMethod;

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Api(optional: true)]
    public ?string $AnnounceUrl;

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    #[Api(optional: true)]
    public ?bool $BeepOnExit;

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    #[Api(optional: true)]
    public ?string $CallSidToCoach;

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    #[Api(optional: true)]
    public ?bool $Coaching;

    /**
     * Whether to end the conference when the participant leaves.
     */
    #[Api(optional: true)]
    public ?bool $EndConferenceOnExit;

    /**
     * Whether the participant should be on hold.
     */
    #[Api(optional: true)]
    public ?bool $Hold;

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @var value-of<HoldMethod>|null $HoldMethod
     */
    #[Api(
        enum: HoldMethod::class,
        optional: true,
    )]
    public ?string $HoldMethod;

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Api(optional: true)]
    public ?string $HoldUrl;

    /**
     * Whether the participant should be muted.
     */
    #[Api(optional: true)]
    public ?bool $Muted;

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    #[Api(optional: true)]
    public ?string $WaitUrl;

    /**
     * `new ParticipantUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantUpdateParams::with(account_sid: ..., conference_sid: ...)
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
     * @param AnnounceMethod|value-of<AnnounceMethod> $AnnounceMethod
     * @param HoldMethod|value-of<HoldMethod> $HoldMethod
     */
    public static function with(
        string $account_sid,
        string $conference_sid,
        AnnounceMethod|string|null $AnnounceMethod = null,
        ?string $AnnounceUrl = null,
        ?bool $BeepOnExit = null,
        ?string $CallSidToCoach = null,
        ?bool $Coaching = null,
        ?bool $EndConferenceOnExit = null,
        ?bool $Hold = null,
        HoldMethod|string|null $HoldMethod = null,
        ?string $HoldUrl = null,
        ?bool $Muted = null,
        ?string $WaitUrl = null,
    ): self {
        $obj = new self;

        $obj->account_sid = $account_sid;
        $obj->conference_sid = $conference_sid;

        null !== $AnnounceMethod && $obj['AnnounceMethod'] = $AnnounceMethod;
        null !== $AnnounceUrl && $obj->AnnounceUrl = $AnnounceUrl;
        null !== $BeepOnExit && $obj->BeepOnExit = $BeepOnExit;
        null !== $CallSidToCoach && $obj->CallSidToCoach = $CallSidToCoach;
        null !== $Coaching && $obj->Coaching = $Coaching;
        null !== $EndConferenceOnExit && $obj->EndConferenceOnExit = $EndConferenceOnExit;
        null !== $Hold && $obj->Hold = $Hold;
        null !== $HoldMethod && $obj['HoldMethod'] = $HoldMethod;
        null !== $HoldUrl && $obj->HoldUrl = $HoldUrl;
        null !== $Muted && $obj->Muted = $Muted;
        null !== $WaitUrl && $obj->WaitUrl = $WaitUrl;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }

    public function withConferenceSid(string $conferenceSid): self
    {
        $obj = clone $this;
        $obj->conference_sid = $conferenceSid;

        return $obj;
    }

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod,
    ): self {
        $obj = clone $this;
        $obj['AnnounceMethod'] = $announceMethod;

        return $obj;
    }

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $obj = clone $this;
        $obj->AnnounceUrl = $announceURL;

        return $obj;
    }

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    public function withBeepOnExit(bool $beepOnExit): self
    {
        $obj = clone $this;
        $obj->BeepOnExit = $beepOnExit;

        return $obj;
    }

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    public function withCallSidToCoach(string $callSidToCoach): self
    {
        $obj = clone $this;
        $obj->CallSidToCoach = $callSidToCoach;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj->Coaching = $coaching;

        return $obj;
    }

    /**
     * Whether to end the conference when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->EndConferenceOnExit = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant should be on hold.
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj->Hold = $hold;

        return $obj;
    }

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @param HoldMethod|value-of<HoldMethod> $holdMethod
     */
    public function withHoldMethod(
        HoldMethod|string $holdMethod,
    ): self {
        $obj = clone $this;
        $obj['HoldMethod'] = $holdMethod;

        return $obj;
    }

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withHoldURL(string $holdURL): self
    {
        $obj = clone $this;
        $obj->HoldUrl = $holdURL;

        return $obj;
    }

    /**
     * Whether the participant should be muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj->Muted = $muted;

        return $obj;
    }

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    public function withWaitURL(string $waitURL): self
    {
        $obj = clone $this;
        $obj->WaitUrl = $waitURL;

        return $obj;
    }
}
