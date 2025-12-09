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
 *   accountSid: string,
 *   amdStatusCallback?: string,
 *   amdStatusCallbackMethod?: AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod>,
 *   beep?: Beep|value-of<Beep>,
 *   callerID?: string,
 *   callSidToCoach?: string,
 *   cancelPlaybackOnDetectMessageEnd?: bool,
 *   cancelPlaybackOnMachineDetection?: bool,
 *   coaching?: bool,
 *   conferenceRecord?: ConferenceRecord|value-of<ConferenceRecord>,
 *   conferenceRecordingStatusCallback?: string,
 *   conferenceRecordingStatusCallbackEvent?: string,
 *   conferenceRecordingStatusCallbackMethod?: ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod>,
 *   conferenceRecordingTimeout?: int,
 *   conferenceStatusCallback?: string,
 *   conferenceStatusCallbackEvent?: string,
 *   conferenceStatusCallbackMethod?: ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod>,
 *   conferenceTrim?: ConferenceTrim|value-of<ConferenceTrim>,
 *   customHeaders?: list<CustomHeader|array{name: string, value: string}>,
 *   earlyMedia?: bool,
 *   endConferenceOnExit?: bool,
 *   from?: string,
 *   machineDetection?: MachineDetection|value-of<MachineDetection>,
 *   machineDetectionSilenceTimeout?: int,
 *   machineDetectionSpeechEndThreshold?: int,
 *   machineDetectionSpeechThreshold?: int,
 *   machineDetectionTimeout?: int,
 *   maxParticipants?: int,
 *   muted?: bool,
 *   preferredCodecs?: string,
 *   record?: bool,
 *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string,
 *   recordingStatusCallbackEvent?: string,
 *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   startConferenceOnEnter?: bool,
 *   statusCallback?: string,
 *   statusCallbackEvent?: string,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   timeLimit?: int,
 *   timeoutSeconds?: int,
 *   to?: string,
 *   trim?: Trim|value-of<Trim>,
 *   waitURL?: string,
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
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod
     * @param Beep|value-of<Beep> $beep
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $conferenceRecordingStatusCallbackMethod
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim
     * @param list<CustomHeader|array{name: string, value: string}> $customHeaders
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param Trim|value-of<Trim> $trim
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
        $obj = new self;

        $obj['accountSid'] = $accountSid;

        null !== $amdStatusCallback && $obj['amdStatusCallback'] = $amdStatusCallback;
        null !== $amdStatusCallbackMethod && $obj['amdStatusCallbackMethod'] = $amdStatusCallbackMethod;
        null !== $beep && $obj['beep'] = $beep;
        null !== $callerID && $obj['callerID'] = $callerID;
        null !== $callSidToCoach && $obj['callSidToCoach'] = $callSidToCoach;
        null !== $cancelPlaybackOnDetectMessageEnd && $obj['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;
        null !== $cancelPlaybackOnMachineDetection && $obj['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;
        null !== $coaching && $obj['coaching'] = $coaching;
        null !== $conferenceRecord && $obj['conferenceRecord'] = $conferenceRecord;
        null !== $conferenceRecordingStatusCallback && $obj['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        null !== $conferenceRecordingStatusCallbackEvent && $obj['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
        null !== $conferenceRecordingStatusCallbackMethod && $obj['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        null !== $conferenceRecordingTimeout && $obj['conferenceRecordingTimeout'] = $conferenceRecordingTimeout;
        null !== $conferenceStatusCallback && $obj['conferenceStatusCallback'] = $conferenceStatusCallback;
        null !== $conferenceStatusCallbackEvent && $obj['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        null !== $conferenceStatusCallbackMethod && $obj['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        null !== $conferenceTrim && $obj['conferenceTrim'] = $conferenceTrim;
        null !== $customHeaders && $obj['customHeaders'] = $customHeaders;
        null !== $earlyMedia && $obj['earlyMedia'] = $earlyMedia;
        null !== $endConferenceOnExit && $obj['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $from && $obj['from'] = $from;
        null !== $machineDetection && $obj['machineDetection'] = $machineDetection;
        null !== $machineDetectionSilenceTimeout && $obj['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
        null !== $machineDetectionSpeechEndThreshold && $obj['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        null !== $machineDetectionSpeechThreshold && $obj['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        null !== $machineDetectionTimeout && $obj['machineDetectionTimeout'] = $machineDetectionTimeout;
        null !== $maxParticipants && $obj['maxParticipants'] = $maxParticipants;
        null !== $muted && $obj['muted'] = $muted;
        null !== $preferredCodecs && $obj['preferredCodecs'] = $preferredCodecs;
        null !== $record && $obj['record'] = $record;
        null !== $recordingChannels && $obj['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $obj['recordingStatusCallback'] = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $obj['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTrack && $obj['recordingTrack'] = $recordingTrack;
        null !== $sipAuthPassword && $obj['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $obj['sipAuthUsername'] = $sipAuthUsername;
        null !== $startConferenceOnEnter && $obj['startConferenceOnEnter'] = $startConferenceOnEnter;
        null !== $statusCallback && $obj['statusCallback'] = $statusCallback;
        null !== $statusCallbackEvent && $obj['statusCallbackEvent'] = $statusCallbackEvent;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $timeLimit && $obj['timeLimit'] = $timeLimit;
        null !== $timeoutSeconds && $obj['timeoutSeconds'] = $timeoutSeconds;
        null !== $to && $obj['to'] = $to;
        null !== $trim && $obj['trim'] = $trim;
        null !== $waitURL && $obj['waitURL'] = $waitURL;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    /**
     * The URL the result of answering machine detection will be sent to.
     */
    public function withAmdStatusCallback(string $amdStatusCallback): self
    {
        $obj = clone $this;
        $obj['amdStatusCallback'] = $amdStatusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     *
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod
     */
    public function withAmdStatusCallbackMethod(
        AmdStatusCallbackMethod|string $amdStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['amdStatusCallbackMethod'] = $amdStatusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to play a notification beep to the conference when the participant enters and exits.
     *
     * @param Beep|value-of<Beep> $beep
     */
    public function withBeep(Beep|string $beep): self
    {
        $obj = clone $this;
        $obj['beep'] = $beep;

        return $obj;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $obj = clone $this;
        $obj['callerID'] = $callerID;

        return $obj;
    }

    /**
     * The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     */
    public function withCallSidToCoach(string $callSidToCoach): self
    {
        $obj = clone $this;
        $obj['callSidToCoach'] = $callSidToCoach;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $obj = clone $this;
        $obj['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $obj = clone $this;
        $obj['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj['coaching'] = $coaching;

        return $obj;
    }

    /**
     * Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     *
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord
     */
    public function withConferenceRecord(
        ConferenceRecord|string $conferenceRecord
    ): self {
        $obj = clone $this;
        $obj['conferenceRecord'] = $conferenceRecord;

        return $obj;
    }

    /**
     * The URL the conference recording callbacks will be sent to.
     */
    public function withConferenceRecordingStatusCallback(
        string $conferenceRecordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     */
    public function withConferenceRecordingStatusCallbackEvent(
        string $conferenceRecordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;

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
        $obj['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withConferenceRecordingTimeout(
        int $conferenceRecordingTimeout
    ): self {
        $obj = clone $this;
        $obj['conferenceRecordingTimeout'] = $conferenceRecordingTimeout;

        return $obj;
    }

    /**
     * The URL the conference callbacks will be sent to.
     */
    public function withConferenceStatusCallback(
        string $conferenceStatusCallback
    ): self {
        $obj = clone $this;
        $obj['conferenceStatusCallback'] = $conferenceStatusCallback;

        return $obj;
    }

    /**
     * The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     */
    public function withConferenceStatusCallbackEvent(
        string $conferenceStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     *
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod
     */
    public function withConferenceStatusCallbackMethod(
        ConferenceStatusCallbackMethod|string $conferenceStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     *
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim
     */
    public function withConferenceTrim(
        ConferenceTrim|string $conferenceTrim
    ): self {
        $obj = clone $this;
        $obj['conferenceTrim'] = $conferenceTrim;

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
        $obj['customHeaders'] = $customHeaders;

        return $obj;
    }

    /**
     * Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj['earlyMedia'] = $earlyMedia;

        return $obj;
    }

    /**
     * Whether to end the conference when the participant leaves. Defaults to `false`.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj['endConferenceOnExit'] = $endConferenceOnExit;

        return $obj;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection
    ): self {
        $obj = clone $this;
        $obj['machineDetection'] = $machineDetection;

        return $obj;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;

        return $obj;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;

        return $obj;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;

        return $obj;
    }

    /**
     * How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $obj = clone $this;
        $obj['machineDetectionTimeout'] = $machineDetectionTimeout;

        return $obj;
    }

    /**
     * The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj['maxParticipants'] = $maxParticipants;

        return $obj;
    }

    /**
     * Whether the participant should be muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj['muted'] = $muted;

        return $obj;
    }

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj['preferredCodecs'] = $preferredCodecs;

        return $obj;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $obj = clone $this;
        $obj['record'] = $record;

        return $obj;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $obj = clone $this;
        $obj['recordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallback'] = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $obj = clone $this;
        $obj['recordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj['sipAuthPassword'] = $sipAuthPassword;

        return $obj;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj['sipAuthUsername'] = $sipAuthUsername;

        return $obj;
    }

    /**
     * Whether to start the conference when the participant enters. Defaults to `true`.
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $obj = clone $this;
        $obj['startConferenceOnEnter'] = $startConferenceOnEnter;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['statusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     */
    public function withStatusCallbackEvent(string $statusCallbackEvent): self
    {
        $obj = clone $this;
        $obj['statusCallbackEvent'] = $statusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['statusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * The maximum duration of the call in seconds.
     */
    public function withTimeLimit(int $timeLimit): self
    {
        $obj = clone $this;
        $obj['timeLimit'] = $timeLimit;

        return $obj;
    }

    /**
     * The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     */
    public function withTimeoutSeconds(int $timeoutSeconds): self
    {
        $obj = clone $this;
        $obj['timeoutSeconds'] = $timeoutSeconds;

        return $obj;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $obj = clone $this;
        $obj['trim'] = $trim;

        return $obj;
    }

    /**
     * The URL to call for an audio file to play while the participant is waiting for the conference to start.
     */
    public function withWaitURL(string $waitURL): self
    {
        $obj = clone $this;
        $obj['waitURL'] = $waitURL;

        return $obj;
    }
}
