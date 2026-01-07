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
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\CustomHeader
 *
 * @phpstan-type ParticipantParticipantsParamsShape = array{
 *   accountSid: string,
 *   amdStatusCallback?: string|null,
 *   amdStatusCallbackMethod?: null|AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod>,
 *   beep?: null|Beep|value-of<Beep>,
 *   callerID?: string|null,
 *   callSidToCoach?: string|null,
 *   cancelPlaybackOnDetectMessageEnd?: bool|null,
 *   cancelPlaybackOnMachineDetection?: bool|null,
 *   coaching?: bool|null,
 *   conferenceRecord?: null|ConferenceRecord|value-of<ConferenceRecord>,
 *   conferenceRecordingStatusCallback?: string|null,
 *   conferenceRecordingStatusCallbackEvent?: string|null,
 *   conferenceRecordingStatusCallbackMethod?: null|ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod>,
 *   conferenceRecordingTimeout?: int|null,
 *   conferenceStatusCallback?: string|null,
 *   conferenceStatusCallbackEvent?: string|null,
 *   conferenceStatusCallbackMethod?: null|ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod>,
 *   conferenceTrim?: null|ConferenceTrim|value-of<ConferenceTrim>,
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   earlyMedia?: bool|null,
 *   endConferenceOnExit?: bool|null,
 *   from?: string|null,
 *   machineDetection?: null|MachineDetection|value-of<MachineDetection>,
 *   machineDetectionSilenceTimeout?: int|null,
 *   machineDetectionSpeechEndThreshold?: int|null,
 *   machineDetectionSpeechThreshold?: int|null,
 *   machineDetectionTimeout?: int|null,
 *   maxParticipants?: int|null,
 *   muted?: bool|null,
 *   preferredCodecs?: string|null,
 *   record?: bool|null,
 *   recordingChannels?: null|RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string|null,
 *   recordingStatusCallbackEvent?: string|null,
 *   recordingStatusCallbackMethod?: null|RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTrack?: null|RecordingTrack|value-of<RecordingTrack>,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 *   startConferenceOnEnter?: bool|null,
 *   statusCallback?: string|null,
 *   statusCallbackEvent?: string|null,
 *   statusCallbackMethod?: null|StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   timeLimit?: int|null,
 *   timeoutSeconds?: int|null,
 *   to?: string|null,
 *   trim?: null|Trim|value-of<Trim>,
 *   waitURL?: string|null,
 * }
 */
final class ParticipantParticipantsParams implements BaseModel
{
    /** @use SdkModel<ParticipantParticipantsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * The URL the result of answering machine detection will be sent to.
     */
    #[Optional('AmdStatusCallback')]
    public ?string $amdStatusCallback;

    /**
     * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<AmdStatusCallbackMethod>|null $amdStatusCallbackMethod
     */
    #[Optional('AmdStatusCallbackMethod', enum: AmdStatusCallbackMethod::class)]
    public ?string $amdStatusCallbackMethod;

    /**
     * Whether to play a notification beep to the conference when the participant enters and exits.
     *
     * @var value-of<Beep>|null $beep
     */
    #[Optional('Beep', enum: Beep::class)]
    public ?string $beep;

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    #[Optional('CallerId')]
    public ?string $callerID;

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    #[Optional('CallSidToCoach')]
    public ?string $callSidToCoach;

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    #[Optional('CancelPlaybackOnDetectMessageEnd')]
    public ?bool $cancelPlaybackOnDetectMessageEnd;

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    #[Optional('CancelPlaybackOnMachineDetection')]
    public ?bool $cancelPlaybackOnMachineDetection;

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    #[Optional('Coaching')]
    public ?bool $coaching;

    /**
     * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     *
     * @var value-of<ConferenceRecord>|null $conferenceRecord
     */
    #[Optional('ConferenceRecord', enum: ConferenceRecord::class)]
    public ?string $conferenceRecord;

    /**
     * The URL the conference recording callbacks will be sent to.
     */
    #[Optional('ConferenceRecordingStatusCallback')]
    public ?string $conferenceRecordingStatusCallback;

    /**
     * The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     */
    #[Optional('ConferenceRecordingStatusCallbackEvent')]
    public ?string $conferenceRecordingStatusCallbackEvent;

    /**
     * HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<ConferenceRecordingStatusCallbackMethod>|null $conferenceRecordingStatusCallbackMethod
     */
    #[Optional(
        'ConferenceRecordingStatusCallbackMethod',
        enum: ConferenceRecordingStatusCallbackMethod::class,
    )]
    public ?string $conferenceRecordingStatusCallbackMethod;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional('ConferenceRecordingTimeout')]
    public ?int $conferenceRecordingTimeout;

    /**
     * The URL the conference callbacks will be sent to.
     */
    #[Optional('ConferenceStatusCallback')]
    public ?string $conferenceStatusCallback;

    /**
     * The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     */
    #[Optional('ConferenceStatusCallbackEvent')]
    public ?string $conferenceStatusCallbackEvent;

    /**
     * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<ConferenceStatusCallbackMethod>|null $conferenceStatusCallbackMethod
     */
    #[Optional(
        'ConferenceStatusCallbackMethod',
        enum: ConferenceStatusCallbackMethod::class,
    )]
    public ?string $conferenceStatusCallbackMethod;

    /**
     * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     *
     * @var value-of<ConferenceTrim>|null $conferenceTrim
     */
    #[Optional('ConferenceTrim', enum: ConferenceTrim::class)]
    public ?string $conferenceTrim;

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('CustomHeaders', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     */
    #[Optional('EarlyMedia')]
    public ?bool $earlyMedia;

    /**
     * Whether to end the conference when the participant leaves. Defaults to `false`.
     */
    #[Optional('EndConferenceOnExit')]
    public ?bool $endConferenceOnExit;

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    #[Optional('From')]
    public ?string $from;

    /**
     * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     *
     * @var value-of<MachineDetection>|null $machineDetection
     */
    #[Optional('MachineDetection', enum: MachineDetection::class)]
    public ?string $machineDetection;

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSilenceTimeout')]
    public ?int $machineDetectionSilenceTimeout;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSpeechEndThreshold')]
    public ?int $machineDetectionSpeechEndThreshold;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSpeechThreshold')]
    public ?int $machineDetectionSpeechThreshold;

    /**
     * How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     */
    #[Optional('MachineDetectionTimeout')]
    public ?int $machineDetectionTimeout;

    /**
     * The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     */
    #[Optional('MaxParticipants')]
    public ?int $maxParticipants;

    /**
     * Whether the participant should be muted.
     */
    #[Optional('Muted')]
    public ?bool $muted;

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    #[Optional('PreferredCodecs')]
    public ?string $preferredCodecs;

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    #[Optional('Record')]
    public ?bool $record;

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @var value-of<RecordingChannels>|null $recordingChannels
     */
    #[Optional('RecordingChannels', enum: RecordingChannels::class)]
    public ?string $recordingChannels;

    /**
     * The URL the recording callbacks will be sent to.
     */
    #[Optional('RecordingStatusCallback')]
    public ?string $recordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Optional('RecordingStatusCallbackEvent')]
    public ?string $recordingStatusCallbackEvent;

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     */
    #[Optional(
        'RecordingStatusCallbackMethod',
        enum: RecordingStatusCallbackMethod::class
    )]
    public ?string $recordingStatusCallbackMethod;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Optional('RecordingTrack', enum: RecordingTrack::class)]
    public ?string $recordingTrack;

    /**
     * The password to use for SIP authentication.
     */
    #[Optional('SipAuthPassword')]
    public ?string $sipAuthPassword;

    /**
     * The username to use for SIP authentication.
     */
    #[Optional('SipAuthUsername')]
    public ?string $sipAuthUsername;

    /**
     * Whether to start the conference when the participant enters. Defaults to `true`.
     */
    #[Optional('StartConferenceOnEnter')]
    public ?bool $startConferenceOnEnter;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Optional('StatusCallback')]
    public ?string $statusCallback;

    /**
     * The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     */
    #[Optional('StatusCallbackEvent')]
    public ?string $statusCallbackEvent;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Optional('StatusCallbackMethod', enum: StatusCallbackMethod::class)]
    public ?string $statusCallbackMethod;

    /**
     * The maximum duration of the call in seconds.
     */
    #[Optional('TimeLimit')]
    public ?int $timeLimit;

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     */
    #[Optional('Timeout')]
    public ?int $timeoutSeconds;

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    #[Optional('To')]
    public ?string $to;

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Optional('Trim', enum: Trim::class)]
    public ?string $trim;

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    #[Optional('WaitUrl')]
    public ?string $waitURL;

    /**
     * `new ParticipantParticipantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipantParticipantsParams::with(accountSid: ...)
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
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod>|null $amdStatusCallbackMethod
     * @param Beep|value-of<Beep>|null $beep
     * @param ConferenceRecord|value-of<ConferenceRecord>|null $conferenceRecord
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod>|null $conferenceRecordingStatusCallbackMethod
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod>|null $conferenceStatusCallbackMethod
     * @param ConferenceTrim|value-of<ConferenceTrim>|null $conferenceTrim
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     * @param MachineDetection|value-of<MachineDetection>|null $machineDetection
     * @param RecordingChannels|value-of<RecordingChannels>|null $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack>|null $recordingTrack
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod>|null $statusCallbackMethod
     * @param Trim|value-of<Trim>|null $trim
     */
    public static function with(
        string $accountSid,
        ?string $amdStatusCallback = null,
        AmdStatusCallbackMethod|string|null $amdStatusCallbackMethod = null,
        Beep|string|null $beep = null,
        ?string $callerID = null,
        ?string $callSidToCoach = null,
        ?bool $cancelPlaybackOnDetectMessageEnd = null,
        ?bool $cancelPlaybackOnMachineDetection = null,
        ?bool $coaching = null,
        ConferenceRecord|string|null $conferenceRecord = null,
        ?string $conferenceRecordingStatusCallback = null,
        ?string $conferenceRecordingStatusCallbackEvent = null,
        ConferenceRecordingStatusCallbackMethod|string|null $conferenceRecordingStatusCallbackMethod = null,
        ?int $conferenceRecordingTimeout = null,
        ?string $conferenceStatusCallback = null,
        ?string $conferenceStatusCallbackEvent = null,
        ConferenceStatusCallbackMethod|string|null $conferenceStatusCallbackMethod = null,
        ConferenceTrim|string|null $conferenceTrim = null,
        ?array $customHeaders = null,
        ?bool $earlyMedia = null,
        ?bool $endConferenceOnExit = null,
        ?string $from = null,
        MachineDetection|string|null $machineDetection = null,
        ?int $machineDetectionSilenceTimeout = null,
        ?int $machineDetectionSpeechEndThreshold = null,
        ?int $machineDetectionSpeechThreshold = null,
        ?int $machineDetectionTimeout = null,
        ?int $maxParticipants = null,
        ?bool $muted = null,
        ?string $preferredCodecs = null,
        ?bool $record = null,
        RecordingChannels|string|null $recordingChannels = null,
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $recordingStatusCallbackMethod = null,
        RecordingTrack|string|null $recordingTrack = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?bool $startConferenceOnEnter = null,
        ?string $statusCallback = null,
        ?string $statusCallbackEvent = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?int $timeLimit = null,
        ?int $timeoutSeconds = null,
        ?string $to = null,
        Trim|string|null $trim = null,
        ?string $waitURL = null,
    ): self {
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $amdStatusCallback && $self['amdStatusCallback'] = $amdStatusCallback;
        null !== $amdStatusCallbackMethod && $self['amdStatusCallbackMethod'] = $amdStatusCallbackMethod;
        null !== $beep && $self['beep'] = $beep;
        null !== $callerID && $self['callerID'] = $callerID;
        null !== $callSidToCoach && $self['callSidToCoach'] = $callSidToCoach;
        null !== $cancelPlaybackOnDetectMessageEnd && $self['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;
        null !== $cancelPlaybackOnMachineDetection && $self['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;
        null !== $coaching && $self['coaching'] = $coaching;
        null !== $conferenceRecord && $self['conferenceRecord'] = $conferenceRecord;
        null !== $conferenceRecordingStatusCallback && $self['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        null !== $conferenceRecordingStatusCallbackEvent && $self['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
        null !== $conferenceRecordingStatusCallbackMethod && $self['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        null !== $conferenceRecordingTimeout && $self['conferenceRecordingTimeout'] = $conferenceRecordingTimeout;
        null !== $conferenceStatusCallback && $self['conferenceStatusCallback'] = $conferenceStatusCallback;
        null !== $conferenceStatusCallbackEvent && $self['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        null !== $conferenceStatusCallbackMethod && $self['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        null !== $conferenceTrim && $self['conferenceTrim'] = $conferenceTrim;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $earlyMedia && $self['earlyMedia'] = $earlyMedia;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $from && $self['from'] = $from;
        null !== $machineDetection && $self['machineDetection'] = $machineDetection;
        null !== $machineDetectionSilenceTimeout && $self['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
        null !== $machineDetectionSpeechEndThreshold && $self['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        null !== $machineDetectionSpeechThreshold && $self['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        null !== $machineDetectionTimeout && $self['machineDetectionTimeout'] = $machineDetectionTimeout;
        null !== $maxParticipants && $self['maxParticipants'] = $maxParticipants;
        null !== $muted && $self['muted'] = $muted;
        null !== $preferredCodecs && $self['preferredCodecs'] = $preferredCodecs;
        null !== $record && $self['record'] = $record;
        null !== $recordingChannels && $self['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $self['recordingStatusCallback'] = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTrack && $self['recordingTrack'] = $recordingTrack;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;
        null !== $startConferenceOnEnter && $self['startConferenceOnEnter'] = $startConferenceOnEnter;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackEvent && $self['statusCallbackEvent'] = $statusCallbackEvent;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $timeLimit && $self['timeLimit'] = $timeLimit;
        null !== $timeoutSeconds && $self['timeoutSeconds'] = $timeoutSeconds;
        null !== $to && $self['to'] = $to;
        null !== $trim && $self['trim'] = $trim;
        null !== $waitURL && $self['waitURL'] = $waitURL;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The URL the result of answering machine detection will be sent to.
     */
    public function withAmdStatusCallback(string $amdStatusCallback): self
    {
        $self = clone $this;
        $self['amdStatusCallback'] = $amdStatusCallback;

        return $self;
    }

    /**
     * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     *
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod
     */
    public function withAmdStatusCallbackMethod(
        AmdStatusCallbackMethod|string $amdStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['amdStatusCallbackMethod'] = $amdStatusCallbackMethod;

        return $self;
    }

    /**
     * Whether to play a notification beep to the conference when the participant enters and exits.
     *
     * @param Beep|value-of<Beep> $beep
     */
    public function withBeep(Beep|string $beep): self
    {
        $self = clone $this;
        $self['beep'] = $beep;

        return $self;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $self = clone $this;
        $self['callerID'] = $callerID;

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
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $self = clone $this;
        $self['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;

        return $self;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $self = clone $this;
        $self['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;

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
     * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     *
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord
     */
    public function withConferenceRecord(
        ConferenceRecord|string $conferenceRecord
    ): self {
        $self = clone $this;
        $self['conferenceRecord'] = $conferenceRecord;

        return $self;
    }

    /**
     * The URL the conference recording callbacks will be sent to.
     */
    public function withConferenceRecordingStatusCallback(
        string $conferenceRecordingStatusCallback
    ): self {
        $self = clone $this;
        $self['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;

        return $self;
    }

    /**
     * The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     */
    public function withConferenceRecordingStatusCallbackEvent(
        string $conferenceRecordingStatusCallbackEvent
    ): self {
        $self = clone $this;
        $self['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     *
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $conferenceRecordingStatusCallbackMethod
     */
    public function withConferenceRecordingStatusCallbackMethod(
        ConferenceRecordingStatusCallbackMethod|string $conferenceRecordingStatusCallbackMethod,
    ): self {
        $self = clone $this;
        $self['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withConferenceRecordingTimeout(
        int $conferenceRecordingTimeout
    ): self {
        $self = clone $this;
        $self['conferenceRecordingTimeout'] = $conferenceRecordingTimeout;

        return $self;
    }

    /**
     * The URL the conference callbacks will be sent to.
     */
    public function withConferenceStatusCallback(
        string $conferenceStatusCallback
    ): self {
        $self = clone $this;
        $self['conferenceStatusCallback'] = $conferenceStatusCallback;

        return $self;
    }

    /**
     * The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     */
    public function withConferenceStatusCallbackEvent(
        string $conferenceStatusCallbackEvent
    ): self {
        $self = clone $this;
        $self['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     *
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod
     */
    public function withConferenceStatusCallbackMethod(
        ConferenceStatusCallbackMethod|string $conferenceStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;

        return $self;
    }

    /**
     * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     *
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim
     */
    public function withConferenceTrim(
        ConferenceTrim|string $conferenceTrim
    ): self {
        $self = clone $this;
        $self['conferenceTrim'] = $conferenceTrim;

        return $self;
    }

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $self = clone $this;
        $self['earlyMedia'] = $earlyMedia;

        return $self;
    }

    /**
     * Whether to end the conference when the participant leaves. Defaults to `false`.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection
    ): self {
        $self = clone $this;
        $self['machineDetection'] = $machineDetection;

        return $self;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $self = clone $this;
        $self['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;

        return $self;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $self = clone $this;
        $self['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;

        return $self;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $self = clone $this;
        $self['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;

        return $self;
    }

    /**
     * How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $self = clone $this;
        $self['machineDetectionTimeout'] = $machineDetectionTimeout;

        return $self;
    }

    /**
     * The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $self = clone $this;
        $self['maxParticipants'] = $maxParticipants;

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
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $self = clone $this;
        $self['preferredCodecs'] = $preferredCodecs;

        return $self;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $self = clone $this;
        $self['record'] = $record;

        return $self;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $self = clone $this;
        $self['recordingChannels'] = $recordingChannels;

        return $self;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $self = clone $this;
        $self['recordingStatusCallback'] = $recordingStatusCallback;

        return $self;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $self;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $self = clone $this;
        $self['recordingTrack'] = $recordingTrack;

        return $self;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $self = clone $this;
        $self['sipAuthPassword'] = $sipAuthPassword;

        return $self;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $self = clone $this;
        $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }

    /**
     * Whether to start the conference when the participant enters. Defaults to `true`.
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $self = clone $this;
        $self['startConferenceOnEnter'] = $startConferenceOnEnter;

        return $self;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $self = clone $this;
        $self['statusCallback'] = $statusCallback;

        return $self;
    }

    /**
     * The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     */
    public function withStatusCallbackEvent(string $statusCallbackEvent): self
    {
        $self = clone $this;
        $self['statusCallbackEvent'] = $statusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $self = clone $this;
        $self['statusCallbackMethod'] = $statusCallbackMethod;

        return $self;
    }

    /**
     * The maximum duration of the call in seconds.
     */
    public function withTimeLimit(int $timeLimit): self
    {
        $self = clone $this;
        $self['timeLimit'] = $timeLimit;

        return $self;
    }

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     */
    public function withTimeoutSeconds(int $timeoutSeconds): self
    {
        $self = clone $this;
        $self['timeoutSeconds'] = $timeoutSeconds;

        return $self;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $self = clone $this;
        $self['trim'] = $trim;

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
