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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ParticipantUpdateParams); // set properties as needed
 * $client->texml.accounts.conferences.participants->update(...$params->toArray());
 * ```
 * Updates a conference participant.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.conferences.participants->update(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Conferences\Participants->update
 *
 * @phpstan-type participant_update_params = array{
 *   accountSid: string,
 *   conferenceSid: string,
 *   announceMethod?: AnnounceMethod|value-of<AnnounceMethod>,
 *   announceURL?: string,
 *   beepOnExit?: bool,
 *   callSidToCoach?: string,
 *   coaching?: bool,
 *   endConferenceOnExit?: bool,
 *   hold?: bool,
 *   holdMethod?: HoldMethod|value-of<HoldMethod>,
 *   holdURL?: string,
 *   muted?: bool,
 *   waitURL?: string,
 * }
 */
final class ParticipantUpdateParams implements BaseModel
{
    /** @use SdkModel<participant_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $conferenceSid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $announceMethod
     */
    #[Api('AnnounceMethod', enum: AnnounceMethod::class, optional: true)]
    public ?string $announceMethod;

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Api('AnnounceUrl', optional: true)]
    public ?string $announceURL;

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    #[Api('BeepOnExit', optional: true)]
    public ?bool $beepOnExit;

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    #[Api('CallSidToCoach', optional: true)]
    public ?string $callSidToCoach;

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    #[Api('Coaching', optional: true)]
    public ?bool $coaching;

    /**
     * Whether to end the conference when the participant leaves.
     */
    #[Api('EndConferenceOnExit', optional: true)]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant should be on hold.
     */
    #[Api('Hold', optional: true)]
    public ?bool $hold;

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @var value-of<HoldMethod>|null $holdMethod
     */
    #[Api('HoldMethod', enum: HoldMethod::class, optional: true)]
    public ?string $holdMethod;

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Api('HoldUrl', optional: true)]
    public ?string $holdURL;

    /**
     * Whether the participant should be muted.
     */
    #[Api('Muted', optional: true)]
    public ?bool $muted;

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    #[Api('WaitUrl', optional: true)]
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
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     * @param HoldMethod|value-of<HoldMethod> $holdMethod
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
        $obj = new self;

        $obj->accountSid = $accountSid;
        $obj->conferenceSid = $conferenceSid;

        null !== $announceMethod && $obj['announceMethod'] = $announceMethod;
        null !== $announceURL && $obj->announceURL = $announceURL;
        null !== $beepOnExit && $obj->beepOnExit = $beepOnExit;
        null !== $callSidToCoach && $obj->callSidToCoach = $callSidToCoach;
        null !== $coaching && $obj->coaching = $coaching;
        null !== $endConferenceOnExit && $obj->endConferenceOnExit = $endConferenceOnExit;
        null !== $hold && $obj->hold = $hold;
        null !== $holdMethod && $obj['holdMethod'] = $holdMethod;
        null !== $holdURL && $obj->holdURL = $holdURL;
        null !== $muted && $obj->muted = $muted;
        null !== $waitURL && $obj->waitURL = $waitURL;

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

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod
    ): self {
        $obj = clone $this;
        $obj['announceMethod'] = $announceMethod;

        return $obj;
    }

    /**
     * The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $obj = clone $this;
        $obj->announceURL = $announceURL;

        return $obj;
    }

    /**
     * Whether to play a notification beep to the conference when the participant exits.
     */
    public function withBeepOnExit(bool $beepOnExit): self
    {
        $obj = clone $this;
        $obj->beepOnExit = $beepOnExit;

        return $obj;
    }

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    public function withCallSidToCoach(string $callSidToCoach): self
    {
        $obj = clone $this;
        $obj->callSidToCoach = $callSidToCoach;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj->coaching = $coaching;

        return $obj;
    }

    /**
     * Whether to end the conference when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->endConferenceOnExit = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant should be on hold.
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj->hold = $hold;

        return $obj;
    }

    /**
     * The HTTP method to use when calling the `HoldUrl`.
     *
     * @param HoldMethod|value-of<HoldMethod> $holdMethod
     */
    public function withHoldMethod(HoldMethod|string $holdMethod): self
    {
        $obj = clone $this;
        $obj['holdMethod'] = $holdMethod;

        return $obj;
    }

    /**
     * The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withHoldURL(string $holdURL): self
    {
        $obj = clone $this;
        $obj->holdURL = $holdURL;

        return $obj;
    }

    /**
     * Whether the participant should be muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj->muted = $muted;

        return $obj;
    }

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    public function withWaitURL(string $waitURL): self
    {
        $obj = clone $this;
        $obj->waitURL = $waitURL;

        return $obj;
    }
}
