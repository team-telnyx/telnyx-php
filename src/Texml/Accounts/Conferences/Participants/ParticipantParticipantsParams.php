<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\AmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Beep;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecord;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceTrim;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\CustomHeader;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\MachineDetection;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Trim;

/**
 * Dials a new conference participant.
 *
 * @see Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService::participants()
 *
 * @phpstan-type ParticipantParticipantsParamsShape = array{
 *   account_sid: string,
 *   AmdStatusCallback?: string,
 *   AmdStatusCallbackMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\AmdStatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\AmdStatusCallbackMethod>,
 *   Beep?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Beep|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Beep>,
 *   CallerId?: string,
 *   CallSidToCoach?: string,
 *   CancelPlaybackOnDetectMessageEnd?: bool,
 *   CancelPlaybackOnMachineDetection?: bool,
 *   Coaching?: bool,
 *   ConferenceRecord?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecord|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecord>,
 *   ConferenceRecordingStatusCallback?: string,
 *   ConferenceRecordingStatusCallbackEvent?: string,
 *   ConferenceRecordingStatusCallbackMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecordingStatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecordingStatusCallbackMethod>,
 *   ConferenceRecordingTimeout?: int,
 *   ConferenceStatusCallback?: string,
 *   ConferenceStatusCallbackEvent?: string,
 *   ConferenceStatusCallbackMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceStatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceStatusCallbackMethod>,
 *   ConferenceTrim?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceTrim|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceTrim>,
 *   CustomHeaders?: list<CustomHeader|array{name: string, value: string}>,
 *   EarlyMedia?: bool,
 *   EndConferenceOnExit?: bool,
 *   From?: string,
 *   MachineDetection?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\MachineDetection|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\MachineDetection>,
 *   MachineDetectionSilenceTimeout?: int,
 *   MachineDetectionSpeechEndThreshold?: int,
 *   MachineDetectionSpeechThreshold?: int,
 *   MachineDetectionTimeout?: int,
 *   MaxParticipants?: int,
 *   Muted?: bool,
 *   PreferredCodecs?: string,
 *   Record?: bool,
 *   RecordingChannels?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingChannels|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingChannels>,
 *   RecordingStatusCallback?: string,
 *   RecordingStatusCallbackEvent?: string,
 *   RecordingStatusCallbackMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingStatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingStatusCallbackMethod>,
 *   RecordingTrack?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingTrack|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingTrack>,
 *   SipAuthPassword?: string,
 *   SipAuthUsername?: string,
 *   StartConferenceOnEnter?: bool,
 *   StatusCallback?: string,
 *   StatusCallbackEvent?: string,
 *   StatusCallbackMethod?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\StatusCallbackMethod>,
 *   TimeLimit?: int,
 *   timeout_seconds?: int,
 *   To?: string,
 *   Trim?: \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Trim|value-of<\Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Trim>,
 *   WaitUrl?: string,
 * }
 */
final class ParticipantParticipantsParams implements BaseModel
{
    /** @use SdkModel<ParticipantParticipantsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * The URL the result of answering machine detection will be sent to.
     */
    #[Optional]
    public ?string $AmdStatusCallback;

    /**
     * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<AmdStatusCallbackMethod>|null $AmdStatusCallbackMethod
     */
    #[Optional(
        enum: AmdStatusCallbackMethod::class,
    )]
    public ?string $AmdStatusCallbackMethod;

    /**
     * Whether to play a notification beep to the conference when the participant enters and exits.
     *
     * @var value-of<Beep>|null $Beep
     */
    #[Optional(
        enum: Beep::class,
    )]
    public ?string $Beep;

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    #[Optional]
    public ?string $CallerId;

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    #[Optional]
    public ?string $CallSidToCoach;

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    #[Optional]
    public ?bool $CancelPlaybackOnDetectMessageEnd;

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    #[Optional]
    public ?bool $CancelPlaybackOnMachineDetection;

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    #[Optional]
    public ?bool $Coaching;

    /**
     * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     *
     * @var value-of<ConferenceRecord>|null $ConferenceRecord
     */
    #[Optional(
        enum: ConferenceRecord::class,
    )]
    public ?string $ConferenceRecord;

    /**
     * The URL the conference recording callbacks will be sent to.
     */
    #[Optional]
    public ?string $ConferenceRecordingStatusCallback;

    /**
     * The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     */
    #[Optional]
    public ?string $ConferenceRecordingStatusCallbackEvent;

    /**
     * HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<ConferenceRecordingStatusCallbackMethod>|null $ConferenceRecordingStatusCallbackMethod
     */
    #[Optional(
        enum: ConferenceRecordingStatusCallbackMethod::class,
    )]
    public ?string $ConferenceRecordingStatusCallbackMethod;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional]
    public ?int $ConferenceRecordingTimeout;

    /**
     * The URL the conference callbacks will be sent to.
     */
    #[Optional]
    public ?string $ConferenceStatusCallback;

    /**
     * The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     */
    #[Optional]
    public ?string $ConferenceStatusCallbackEvent;

    /**
     * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<ConferenceStatusCallbackMethod>|null $ConferenceStatusCallbackMethod
     */
    #[Optional(
        enum: ConferenceStatusCallbackMethod::class,
    )]
    public ?string $ConferenceStatusCallbackMethod;

    /**
     * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     *
     * @var value-of<ConferenceTrim>|null $ConferenceTrim
     */
    #[Optional(
        enum: ConferenceTrim::class,
    )]
    public ?string $ConferenceTrim;

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @var list<CustomHeader>|null $CustomHeaders
     */
    #[Optional(list: CustomHeader::class)]
    public ?array $CustomHeaders;

    /**
     * Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     */
    #[Optional]
    public ?bool $EarlyMedia;

    /**
     * Whether to end the conference when the participant leaves. Defaults to `false`.
     */
    #[Optional]
    public ?bool $EndConferenceOnExit;

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    #[Optional]
    public ?string $From;

    /**
     * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     *
     * @var value-of<MachineDetection>|null $MachineDetection
     */
    #[Optional(
        enum: MachineDetection::class,
    )]
    public ?string $MachineDetection;

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    #[Optional]
    public ?int $MachineDetectionSilenceTimeout;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    #[Optional]
    public ?int $MachineDetectionSpeechEndThreshold;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    #[Optional]
    public ?int $MachineDetectionSpeechThreshold;

    /**
     * How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     */
    #[Optional]
    public ?int $MachineDetectionTimeout;

    /**
     * The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     */
    #[Optional]
    public ?int $MaxParticipants;

    /**
     * Whether the participant should be muted.
     */
    #[Optional]
    public ?bool $Muted;

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    #[Optional]
    public ?string $PreferredCodecs;

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    #[Optional]
    public ?bool $Record;

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @var value-of<RecordingChannels>|null $RecordingChannels
     */
    #[Optional(
        enum: RecordingChannels::class,
    )]
    public ?string $RecordingChannels;

    /**
     * The URL the recording callbacks will be sent to.
     */
    #[Optional]
    public ?string $RecordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Optional]
    public ?string $RecordingStatusCallbackEvent;

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $RecordingStatusCallbackMethod
     */
    #[Optional(
        enum: RecordingStatusCallbackMethod::class,
    )]
    public ?string $RecordingStatusCallbackMethod;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $RecordingTrack
     */
    #[Optional(
        enum: RecordingTrack::class,
    )]
    public ?string $RecordingTrack;

    /**
     * The password to use for SIP authentication.
     */
    #[Optional]
    public ?string $SipAuthPassword;

    /**
     * The username to use for SIP authentication.
     */
    #[Optional]
    public ?string $SipAuthUsername;

    /**
     * Whether to start the conference when the participant enters. Defaults to `true`.
     */
    #[Optional]
    public ?bool $StartConferenceOnEnter;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Optional]
    public ?string $StatusCallback;

    /**
     * The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     */
    #[Optional]
    public ?string $StatusCallbackEvent;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Optional(
        enum: StatusCallbackMethod::class,
    )]
    public ?string $StatusCallbackMethod;

    /**
     * The maximum duration of the call in seconds.
     */
    #[Optional]
    public ?int $TimeLimit;

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     */
    #[Optional]
    public ?int $timeout_seconds;

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    #[Optional]
    public ?string $To;

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @var value-of<Trim>|null $Trim
     */
    #[Optional(
        enum: Trim::class,
    )]
    public ?string $Trim;

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    #[Optional]
    public ?string $WaitUrl;

    /**
     * `new ParticipantParticipantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantParticipantsParams::with(account_sid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipantParticipantsParams)->withAccountSid(...)
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
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $AmdStatusCallbackMethod
     * @param Beep|value-of<Beep> $Beep
     * @param ConferenceRecord|value-of<ConferenceRecord> $ConferenceRecord
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $ConferenceRecordingStatusCallbackMethod
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $ConferenceStatusCallbackMethod
     * @param ConferenceTrim|value-of<ConferenceTrim> $ConferenceTrim
     * @param list<CustomHeader|array{name: string, value: string}> $CustomHeaders
     * @param MachineDetection|value-of<MachineDetection> $MachineDetection
     * @param RecordingChannels|value-of<RecordingChannels> $RecordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $RecordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $RecordingTrack
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     * @param Trim|value-of<Trim> $Trim
     */
    public static function with(
        string $account_sid,
        ?string $AmdStatusCallback = null,
        AmdStatusCallbackMethod|string|null $AmdStatusCallbackMethod = null,
        Beep|string|null $Beep = null,
        ?string $CallerId = null,
        ?string $CallSidToCoach = null,
        ?bool $CancelPlaybackOnDetectMessageEnd = null,
        ?bool $CancelPlaybackOnMachineDetection = null,
        ?bool $Coaching = null,
        ConferenceRecord|string|null $ConferenceRecord = null,
        ?string $ConferenceRecordingStatusCallback = null,
        ?string $ConferenceRecordingStatusCallbackEvent = null,
        ConferenceRecordingStatusCallbackMethod|string|null $ConferenceRecordingStatusCallbackMethod = null,
        ?int $ConferenceRecordingTimeout = null,
        ?string $ConferenceStatusCallback = null,
        ?string $ConferenceStatusCallbackEvent = null,
        ConferenceStatusCallbackMethod|string|null $ConferenceStatusCallbackMethod = null,
        ConferenceTrim|string|null $ConferenceTrim = null,
        ?array $CustomHeaders = null,
        ?bool $EarlyMedia = null,
        ?bool $EndConferenceOnExit = null,
        ?string $From = null,
        MachineDetection|string|null $MachineDetection = null,
        ?int $MachineDetectionSilenceTimeout = null,
        ?int $MachineDetectionSpeechEndThreshold = null,
        ?int $MachineDetectionSpeechThreshold = null,
        ?int $MachineDetectionTimeout = null,
        ?int $MaxParticipants = null,
        ?bool $Muted = null,
        ?string $PreferredCodecs = null,
        ?bool $Record = null,
        RecordingChannels|string|null $RecordingChannels = null,
        ?string $RecordingStatusCallback = null,
        ?string $RecordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $RecordingStatusCallbackMethod = null,
        RecordingTrack|string|null $RecordingTrack = null,
        ?string $SipAuthPassword = null,
        ?string $SipAuthUsername = null,
        ?bool $StartConferenceOnEnter = null,
        ?string $StatusCallback = null,
        ?string $StatusCallbackEvent = null,
        StatusCallbackMethod|string|null $StatusCallbackMethod = null,
        ?int $TimeLimit = null,
        ?int $timeout_seconds = null,
        ?string $To = null,
        Trim|string|null $Trim = null,
        ?string $WaitUrl = null,
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        null !== $AmdStatusCallback && $obj['AmdStatusCallback'] = $AmdStatusCallback;
        null !== $AmdStatusCallbackMethod && $obj['AmdStatusCallbackMethod'] = $AmdStatusCallbackMethod;
        null !== $Beep && $obj['Beep'] = $Beep;
        null !== $CallerId && $obj['CallerId'] = $CallerId;
        null !== $CallSidToCoach && $obj['CallSidToCoach'] = $CallSidToCoach;
        null !== $CancelPlaybackOnDetectMessageEnd && $obj['CancelPlaybackOnDetectMessageEnd'] = $CancelPlaybackOnDetectMessageEnd;
        null !== $CancelPlaybackOnMachineDetection && $obj['CancelPlaybackOnMachineDetection'] = $CancelPlaybackOnMachineDetection;
        null !== $Coaching && $obj['Coaching'] = $Coaching;
        null !== $ConferenceRecord && $obj['ConferenceRecord'] = $ConferenceRecord;
        null !== $ConferenceRecordingStatusCallback && $obj['ConferenceRecordingStatusCallback'] = $ConferenceRecordingStatusCallback;
        null !== $ConferenceRecordingStatusCallbackEvent && $obj['ConferenceRecordingStatusCallbackEvent'] = $ConferenceRecordingStatusCallbackEvent;
        null !== $ConferenceRecordingStatusCallbackMethod && $obj['ConferenceRecordingStatusCallbackMethod'] = $ConferenceRecordingStatusCallbackMethod;
        null !== $ConferenceRecordingTimeout && $obj['ConferenceRecordingTimeout'] = $ConferenceRecordingTimeout;
        null !== $ConferenceStatusCallback && $obj['ConferenceStatusCallback'] = $ConferenceStatusCallback;
        null !== $ConferenceStatusCallbackEvent && $obj['ConferenceStatusCallbackEvent'] = $ConferenceStatusCallbackEvent;
        null !== $ConferenceStatusCallbackMethod && $obj['ConferenceStatusCallbackMethod'] = $ConferenceStatusCallbackMethod;
        null !== $ConferenceTrim && $obj['ConferenceTrim'] = $ConferenceTrim;
        null !== $CustomHeaders && $obj['CustomHeaders'] = $CustomHeaders;
        null !== $EarlyMedia && $obj['EarlyMedia'] = $EarlyMedia;
        null !== $EndConferenceOnExit && $obj['EndConferenceOnExit'] = $EndConferenceOnExit;
        null !== $From && $obj['From'] = $From;
        null !== $MachineDetection && $obj['MachineDetection'] = $MachineDetection;
        null !== $MachineDetectionSilenceTimeout && $obj['MachineDetectionSilenceTimeout'] = $MachineDetectionSilenceTimeout;
        null !== $MachineDetectionSpeechEndThreshold && $obj['MachineDetectionSpeechEndThreshold'] = $MachineDetectionSpeechEndThreshold;
        null !== $MachineDetectionSpeechThreshold && $obj['MachineDetectionSpeechThreshold'] = $MachineDetectionSpeechThreshold;
        null !== $MachineDetectionTimeout && $obj['MachineDetectionTimeout'] = $MachineDetectionTimeout;
        null !== $MaxParticipants && $obj['MaxParticipants'] = $MaxParticipants;
        null !== $Muted && $obj['Muted'] = $Muted;
        null !== $PreferredCodecs && $obj['PreferredCodecs'] = $PreferredCodecs;
        null !== $Record && $obj['Record'] = $Record;
        null !== $RecordingChannels && $obj['RecordingChannels'] = $RecordingChannels;
        null !== $RecordingStatusCallback && $obj['RecordingStatusCallback'] = $RecordingStatusCallback;
        null !== $RecordingStatusCallbackEvent && $obj['RecordingStatusCallbackEvent'] = $RecordingStatusCallbackEvent;
        null !== $RecordingStatusCallbackMethod && $obj['RecordingStatusCallbackMethod'] = $RecordingStatusCallbackMethod;
        null !== $RecordingTrack && $obj['RecordingTrack'] = $RecordingTrack;
        null !== $SipAuthPassword && $obj['SipAuthPassword'] = $SipAuthPassword;
        null !== $SipAuthUsername && $obj['SipAuthUsername'] = $SipAuthUsername;
        null !== $StartConferenceOnEnter && $obj['StartConferenceOnEnter'] = $StartConferenceOnEnter;
        null !== $StatusCallback && $obj['StatusCallback'] = $StatusCallback;
        null !== $StatusCallbackEvent && $obj['StatusCallbackEvent'] = $StatusCallbackEvent;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $TimeLimit && $obj['TimeLimit'] = $TimeLimit;
        null !== $timeout_seconds && $obj['timeout_seconds'] = $timeout_seconds;
        null !== $To && $obj['To'] = $To;
        null !== $Trim && $obj['Trim'] = $Trim;
        null !== $WaitUrl && $obj['WaitUrl'] = $WaitUrl;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * The URL the result of answering machine detection will be sent to.
     */
    public function withAmdStatusCallback(string $amdStatusCallback): self
    {
        $obj = clone $this;
        $obj['AmdStatusCallback'] = $amdStatusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     *
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod
     */
    public function withAmdStatusCallbackMethod(
        AmdStatusCallbackMethod|string $amdStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['AmdStatusCallbackMethod'] = $amdStatusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to play a notification beep to the conference when the participant enters and exits.
     *
     * @param Beep|value-of<Beep> $beep
     */
    public function withBeep(
        Beep|string $beep,
    ): self {
        $obj = clone $this;
        $obj['Beep'] = $beep;

        return $obj;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $obj = clone $this;
        $obj['CallerId'] = $callerID;

        return $obj;
    }

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    public function withCallSidToCoach(string $callSidToCoach): self
    {
        $obj = clone $this;
        $obj['CallSidToCoach'] = $callSidToCoach;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $obj = clone $this;
        $obj['CancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $obj = clone $this;
        $obj['CancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj['Coaching'] = $coaching;

        return $obj;
    }

    /**
     * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     *
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord
     */
    public function withConferenceRecord(
        ConferenceRecord|string $conferenceRecord,
    ): self {
        $obj = clone $this;
        $obj['ConferenceRecord'] = $conferenceRecord;

        return $obj;
    }

    /**
     * The URL the conference recording callbacks will be sent to.
     */
    public function withConferenceRecordingStatusCallback(
        string $conferenceRecordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['ConferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     */
    public function withConferenceRecordingStatusCallbackEvent(
        string $conferenceRecordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['ConferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     *
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $conferenceRecordingStatusCallbackMethod
     */
    public function withConferenceRecordingStatusCallbackMethod(
        ConferenceRecordingStatusCallbackMethod|string $conferenceRecordingStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['ConferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withConferenceRecordingTimeout(
        int $conferenceRecordingTimeout
    ): self {
        $obj = clone $this;
        $obj['ConferenceRecordingTimeout'] = $conferenceRecordingTimeout;

        return $obj;
    }

    /**
     * The URL the conference callbacks will be sent to.
     */
    public function withConferenceStatusCallback(
        string $conferenceStatusCallback
    ): self {
        $obj = clone $this;
        $obj['ConferenceStatusCallback'] = $conferenceStatusCallback;

        return $obj;
    }

    /**
     * The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     */
    public function withConferenceStatusCallbackEvent(
        string $conferenceStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['ConferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     *
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod
     */
    public function withConferenceStatusCallbackMethod(
        ConferenceStatusCallbackMethod|string $conferenceStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['ConferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     *
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim
     */
    public function withConferenceTrim(
        ConferenceTrim|string $conferenceTrim,
    ): self {
        $obj = clone $this;
        $obj['ConferenceTrim'] = $conferenceTrim;

        return $obj;
    }

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @param list<CustomHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj['CustomHeaders'] = $customHeaders;

        return $obj;
    }

    /**
     * Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj['EarlyMedia'] = $earlyMedia;

        return $obj;
    }

    /**
     * Whether to end the conference when the participant leaves. Defaults to `false`.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj['EndConferenceOnExit'] = $endConferenceOnExit;

        return $obj;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['From'] = $from;

        return $obj;
    }

    /**
     * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection,
    ): self {
        $obj = clone $this;
        $obj['MachineDetection'] = $machineDetection;

        return $obj;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $obj = clone $this;
        $obj['MachineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;

        return $obj;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $obj = clone $this;
        $obj['MachineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;

        return $obj;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $obj = clone $this;
        $obj['MachineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;

        return $obj;
    }

    /**
     * How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $obj = clone $this;
        $obj['MachineDetectionTimeout'] = $machineDetectionTimeout;

        return $obj;
    }

    /**
     * The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj['MaxParticipants'] = $maxParticipants;

        return $obj;
    }

    /**
     * Whether the participant should be muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj['Muted'] = $muted;

        return $obj;
    }

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj['PreferredCodecs'] = $preferredCodecs;

        return $obj;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $obj = clone $this;
        $obj['Record'] = $record;

        return $obj;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels,
    ): self {
        $obj = clone $this;
        $obj['RecordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallback'] = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack,
    ): self {
        $obj = clone $this;
        $obj['RecordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj['SipAuthPassword'] = $sipAuthPassword;

        return $obj;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj['SipAuthUsername'] = $sipAuthUsername;

        return $obj;
    }

    /**
     * Whether to start the conference when the participant enters. Defaults to `true`.
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $obj = clone $this;
        $obj['StartConferenceOnEnter'] = $startConferenceOnEnter;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['StatusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     */
    public function withStatusCallbackEvent(string $statusCallbackEvent): self
    {
        $obj = clone $this;
        $obj['StatusCallbackEvent'] = $statusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['StatusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * The maximum duration of the call in seconds.
     */
    public function withTimeLimit(int $timeLimit): self
    {
        $obj = clone $this;
        $obj['TimeLimit'] = $timeLimit;

        return $obj;
    }

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     */
    public function withTimeoutSeconds(int $timeoutSeconds): self
    {
        $obj = clone $this;
        $obj['timeout_seconds'] = $timeoutSeconds;

        return $obj;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['To'] = $to;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(
        Trim|string $trim,
    ): self {
        $obj = clone $this;
        $obj['Trim'] = $trim;

        return $obj;
    }

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    public function withWaitURL(string $waitURL): self
    {
        $obj = clone $this;
        $obj['WaitUrl'] = $waitURL;

        return $obj;
    }
}
