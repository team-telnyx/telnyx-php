<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Conferences;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\AmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Beep;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecord;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceTrim;
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

use const Telnyx\Core\OMIT as omit;

interface ParticipantsContract
{
    /**
     * @api
     *
     * @param string $accountSid
     * @param string $conferenceSid
     *
     * @return ParticipantGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        $accountSid,
        $conferenceSid,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetResponse;

    /**
     * @api
     *
     * @param string $accountSid
     * @param string $conferenceSid
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL The URL to call to announce something to the participant. The URL may return an MP3 fileo a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param bool $beepOnExit whether to play a notification beep to the conference when the participant exits
     * @param string $callSidToCoach The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     * @param bool $coaching Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     * @param bool $endConferenceOnExit whether to end the conference when the participant leaves
     * @param bool $hold whether the participant should be on hold
     * @param HoldMethod|value-of<HoldMethod> $holdMethod the HTTP method to use when calling the `HoldUrl`
     * @param string $holdURL The URL to be called using the `HoldMethod` for music that plays when the participant is on hold. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param bool $muted whether the participant should be muted
     * @param string $waitURL the URL to call for an audio file to play while the participant is waiting for the conference to start
     *
     * @return ParticipantUpdateResponse<HasRawResponse>
     */
    public function update(
        string $callSidOrParticipantLabel,
        $accountSid,
        $conferenceSid,
        $announceMethod = omit,
        $announceURL = omit,
        $beepOnExit = omit,
        $callSidToCoach = omit,
        $coaching = omit,
        $endConferenceOnExit = omit,
        $hold = omit,
        $holdMethod = omit,
        $holdURL = omit,
        $muted = omit,
        $waitURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ParticipantUpdateResponse;

    /**
     * @api
     *
     * @param string $accountSid
     * @param string $conferenceSid
     */
    public function delete(
        string $callSidOrParticipantLabel,
        $accountSid,
        $conferenceSid,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $accountSid
     * @param string $amdStatusCallback the URL the result of answering machine detection will be sent to
     * @param AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod> $amdStatusCallbackMethod HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
     * @param Beep|value-of<Beep> $beep whether to play a notification beep to the conference when the participant enters and exits
     * @param string $callerID To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     * @param string $callSidToCoach The SID of the participant who is being coached. The participant being coached is the only participant who can hear the participant who is coaching.
     * @param bool $cancelPlaybackOnDetectMessageEnd Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     * @param bool $cancelPlaybackOnMachineDetection Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     * @param bool $coaching Whether the participant is coaching another call. When `true`, `CallSidToCoach` has to be given.
     * @param ConferenceRecord|value-of<ConferenceRecord> $conferenceRecord Whether to record the conference the participant is joining. Defualts to `do-not-record`. The boolean values `true` and `false` are synonymous with `record-from-start` and `do-not-record` respectively.
     * @param string $conferenceRecordingStatusCallback the URL the conference recording callbacks will be sent to
     * @param string $conferenceRecordingStatusCallbackEvent The changes to the conference recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`. `failed` and `absent` are synonymous.
     * @param ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod> $conferenceRecordingStatusCallbackMethod HTTP request type used for `ConferenceRecordingStatusCallback`. Defaults to `POST`.
     * @param int $conferenceRecordingTimeout The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite)
     * @param string $conferenceStatusCallback the URL the conference callbacks will be sent to
     * @param string $conferenceStatusCallbackEvent The changes to the conference's state that should generate a call to `ConferenceStatusCallback`. Can be: `start`, `end`, `join` and `leave`. Separate multiple values with a space. By default no callbacks are sent.
     * @param ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod> $conferenceStatusCallbackMethod HTTP request type used for `ConferenceStatusCallback`. Defaults to `POST`.
     * @param ConferenceTrim|value-of<ConferenceTrim> $conferenceTrim Whether to trim any leading and trailing silence from the conference recording. Defaults to `trim-silence`.
     * @param bool $earlyMedia Whether participant shall be bridged to conference before the participant answers (from early media if available). Defaults to `false`.
     * @param bool $endConferenceOnExit Whether to end the conference when the participant leaves. Defaults to `false`.
     * @param string $from The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     * @param MachineDetection|value-of<MachineDetection> $machineDetection Whether to detect if a human or an answering machine picked up the call. Use `Enable` if you would like to ne notified as soon as the called party is identified. Use `DetectMessageEnd`, if you would like to leave a message on an answering machine.
     * @param int $machineDetectionSilenceTimeout If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechEndThreshold Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechThreshold Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionTimeout How long answering machine detection should go on for before sending an `Unknown` result. Given in milliseconds.
     * @param int $maxParticipants The maximum number of participants in the conference. Can be a positive integer from 2 to 800. The default value is 250.
     * @param bool $muted whether the participant should be muted
     * @param string $preferredCodecs the list of comma-separated codecs to be offered on a call
     * @param bool $record Whether to record the entire participant's call leg. Defaults to `false`.
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels The number of channels in the final recording. Defaults to `mono`.
     * @param string $recordingStatusCallback the URL the recording callbacks will be sent to
     * @param string $recordingStatusCallbackEvent The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack The audio track to record for the call. The default is `both`.
     * @param string $sipAuthPassword the password to use for SIP authentication
     * @param string $sipAuthUsername the username to use for SIP authentication
     * @param bool $startConferenceOnEnter Whether to start the conference when the participant enters. Defaults to `true`.
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param string $statusCallbackEvent The changes to the call's state that should generate a call to `StatusCallback`. Can be: `initiated`, `ringing`, `answered`, and `completed`. Separate multiple values with a space. The default value is `completed`.
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param int $timeLimit the maximum duration of the call in seconds
     * @param int $timeoutSeconds The number of seconds that we should allow the phone to ring before assuming there is no answer. Can be an integer between 5 and 120, inclusive. The default value is 30.
     * @param string $to The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $waitURL the URL to call for an audio file to play while the participant is waiting for the conference to start
     *
     * @return ParticipantParticipantsResponse<HasRawResponse>
     */
    public function participants(
        string $conferenceSid,
        $accountSid,
        $amdStatusCallback = omit,
        $amdStatusCallbackMethod = omit,
        $beep = omit,
        $callerID = omit,
        $callSidToCoach = omit,
        $cancelPlaybackOnDetectMessageEnd = omit,
        $cancelPlaybackOnMachineDetection = omit,
        $coaching = omit,
        $conferenceRecord = omit,
        $conferenceRecordingStatusCallback = omit,
        $conferenceRecordingStatusCallbackEvent = omit,
        $conferenceRecordingStatusCallbackMethod = omit,
        $conferenceRecordingTimeout = omit,
        $conferenceStatusCallback = omit,
        $conferenceStatusCallbackEvent = omit,
        $conferenceStatusCallbackMethod = omit,
        $conferenceTrim = omit,
        $earlyMedia = omit,
        $endConferenceOnExit = omit,
        $from = omit,
        $machineDetection = omit,
        $machineDetectionSilenceTimeout = omit,
        $machineDetectionSpeechEndThreshold = omit,
        $machineDetectionSpeechThreshold = omit,
        $machineDetectionTimeout = omit,
        $maxParticipants = omit,
        $muted = omit,
        $preferredCodecs = omit,
        $record = omit,
        $recordingChannels = omit,
        $recordingStatusCallback = omit,
        $recordingStatusCallbackEvent = omit,
        $recordingStatusCallbackMethod = omit,
        $recordingTrack = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $startConferenceOnEnter = omit,
        $statusCallback = omit,
        $statusCallbackEvent = omit,
        $statusCallbackMethod = omit,
        $timeLimit = omit,
        $timeoutSeconds = omit,
        $to = omit,
        $trim = omit,
        $waitURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ParticipantParticipantsResponse;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return ParticipantGetParticipantsResponse<HasRawResponse>
     */
    public function retrieveParticipants(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetParticipantsResponse;
}
