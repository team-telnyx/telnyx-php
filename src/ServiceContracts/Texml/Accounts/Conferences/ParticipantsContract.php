<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Conferences;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse;
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
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\HoldMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse;

/**
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\CustomHeader
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ParticipantsContract
{
    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        string $accountSid,
        string $conferenceSid,
        RequestOptions|array|null $requestOptions = null,
    ): ParticipantGetResponse;

    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel path param: CallSid or Label of the Participant to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod Body param: The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL Body param: The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param bool $beepOnExit body param: Whether to play a notification beep to the conference when the participant exits
     * @param string $callSidToCoach Body param: The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     * @param bool $coaching Body param: Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     * @param bool $endConferenceOnExit body param: Whether to end the conference when the participant leaves
     * @param bool $hold body param: Whether the participant should be on hold
     * @param HoldMethod|value-of<HoldMethod> $holdMethod body param: The HTTP method to use when calling the `HoldUrl`
     * @param string $holdURL Body param: The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param bool $muted body param: Whether the participant should be muted
     * @param string $waitURL body param: The URL to call for an audio file to play while the participant is waiting for the conference to start
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $callSidOrParticipantLabel,
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
        RequestOptions|array|null $requestOptions = null,
    ): ParticipantUpdateResponse;

    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $callSidOrParticipantLabel,
        string $accountSid,
        string $conferenceSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $amdStatusCallback body param: The URL the result of answering machine detection will be sent to
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod Body param: HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     * @param Beep|value-of<Beep> $beep body param: Whether to play a notification beep to the conference when the participant enters and exits
     * @param string $callerID Body param: To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     * @param string $callSidToCoach Body param: The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     * @param bool $cancelPlaybackOnDetectMessageEnd Body param: Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     * @param bool $cancelPlaybackOnMachineDetection Body param: Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     * @param bool $coaching Body param: Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord Body param: Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     * @param string $conferenceRecordingStatusCallback body param: The URL the conference recording callbacks will be sent to
     * @param string $conferenceRecordingStatusCallbackEvent Body param: The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $conferenceRecordingStatusCallbackMethod Body param: HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     * @param int $conferenceRecordingTimeout Body param: The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite)
     * @param string $conferenceStatusCallback body param: The URL the conference callbacks will be sent to
     * @param string $conferenceStatusCallbackEvent Body param: The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod Body param: HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim Body param: Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders Body param: Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     * @param bool $earlyMedia Body param: Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     * @param bool $endConferenceOnExit Body param: Whether to end the conference when the participant leaves. Defaults to `false`.
     * @param string $from Body param: The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     * @param MachineDetection|value-of<MachineDetection> $machineDetection Body param: Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     * @param int $machineDetectionSilenceTimeout Body param: If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechEndThreshold Body param: Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechThreshold Body param: Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionTimeout Body param: How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     * @param int $maxParticipants Body param: The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     * @param bool $muted body param: Whether the participant should be muted
     * @param string $preferredCodecs body param: The list of comma-separated codecs to be offered on a call
     * @param bool $record Body param: Whether to record the entire participant's call leg. Defaults to `false`.
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels Body param: The number of channels in the final recording. Defaults to `mono`.
     * @param string $recordingStatusCallback body param: The URL the recording callbacks will be sent to
     * @param string $recordingStatusCallbackEvent Body param: The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod Body param: HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack Body param: The audio track to record for the call. The default is `both`.
     * @param string $sipAuthPassword body param: The password to use for SIP authentication
     * @param string $sipAuthUsername body param: The username to use for SIP authentication
     * @param bool $startConferenceOnEnter Body param: Whether to start the conference when the participant enters. Defaults to `true`.
     * @param string $statusCallback body param: URL destination for Telnyx to send status callback events to for the call
     * @param string $statusCallbackEvent Body param: The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod body param: HTTP request type used for `StatusCallback`
     * @param int $timeLimit body param: The maximum duration of the call in seconds
     * @param int $timeoutSeconds Body param: The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     * @param string $to Body param: The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     * @param Trim|value-of<Trim> $trim Body param: Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $waitURL body param: The URL to call for an audio file to play while the participant is waiting for the conference to start
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function participants(
        string $conferenceSid,
        string $accountSid,
        ?string $amdStatusCallback = null,
        AmdStatusCallbackMethod|string|null $amdStatusCallbackMethod = null,
        Beep|string|null $beep = null,
        ?string $callerID = null,
        ?string $callSidToCoach = null,
        bool $cancelPlaybackOnDetectMessageEnd = true,
        bool $cancelPlaybackOnMachineDetection = true,
        ?bool $coaching = null,
        ConferenceRecord|string|null $conferenceRecord = null,
        ?string $conferenceRecordingStatusCallback = null,
        ?string $conferenceRecordingStatusCallbackEvent = null,
        ConferenceRecordingStatusCallbackMethod|string|null $conferenceRecordingStatusCallbackMethod = null,
        int $conferenceRecordingTimeout = 0,
        ?string $conferenceStatusCallback = null,
        ?string $conferenceStatusCallbackEvent = null,
        ConferenceStatusCallbackMethod|string|null $conferenceStatusCallbackMethod = null,
        ConferenceTrim|string|null $conferenceTrim = null,
        ?array $customHeaders = null,
        bool $earlyMedia = false,
        ?bool $endConferenceOnExit = null,
        ?string $from = null,
        MachineDetection|string|null $machineDetection = null,
        int $machineDetectionSilenceTimeout = 3500,
        int $machineDetectionSpeechEndThreshold = 800,
        int $machineDetectionSpeechThreshold = 3500,
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
        RequestOptions|array|null $requestOptions = null,
    ): ParticipantParticipantsResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $conferenceSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): ParticipantGetParticipantsResponse;
}
