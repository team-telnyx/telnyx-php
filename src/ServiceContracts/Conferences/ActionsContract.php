<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Conferences;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Conferences\Actions\ActionEndConferenceResponse;
use Telnyx\Conferences\Actions\ActionGatherDtmfAudioResponse;
use Telnyx\Conferences\Actions\ActionHoldResponse;
use Telnyx\Conferences\Actions\ActionJoinParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionJoinResponse;
use Telnyx\Conferences\Actions\ActionLeaveResponse;
use Telnyx\Conferences\Actions\ActionMuteResponse;
use Telnyx\Conferences\Actions\ActionPlayResponse;
use Telnyx\Conferences\Actions\ActionRecordPauseResponse;
use Telnyx\Conferences\Actions\ActionRecordResumeResponse;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Format;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Trim;
use Telnyx\Conferences\Actions\ActionRecordStartResponse;
use Telnyx\Conferences\Actions\ActionRecordStopResponse;
use Telnyx\Conferences\Actions\ActionSendDtmfResponse;
use Telnyx\Conferences\Actions\ActionSpeakParams\Language;
use Telnyx\Conferences\Actions\ActionSpeakParams\PayloadType;
use Telnyx\Conferences\Actions\ActionSpeakResponse;
use Telnyx\Conferences\Actions\ActionStopResponse;
use Telnyx\Conferences\Actions\ActionUnholdResponse;
use Telnyx\Conferences\Actions\ActionUnmuteResponse;
use Telnyx\Conferences\Actions\ActionUpdateParams\Region;
use Telnyx\Conferences\Actions\ActionUpdateParams\SupervisorRole;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\RequestOptions;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;

/**
 * @phpstan-import-type LoopcountShape from \Telnyx\Calls\Actions\Loopcount
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param Region|value-of<Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $callControlID,
        SupervisorRole|string $supervisorRole,
        ?string $commandID = null,
        Region|string|null $region = null,
        ?array $whisperCallControlIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same conference.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function endConference(
        string $id,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionEndConferenceResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param string $callControlID unique identifier and token for controlling the call leg that will receive the gather prompt
     * @param string $audioURL The URL of the audio file to play as the gather prompt. Must be WAV or MP3 format.
     * @param string $clientState Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     * @param string $gatherID Identifier for this gather command. Will be included in the gather ended webhook. Maximum 100 characters.
     * @param int $initialTimeoutMillis duration in milliseconds to wait for the first digit before timing out
     * @param int $interDigitTimeoutMillis duration in milliseconds to wait between digits
     * @param string $invalidAudioURL URL of audio file to play when invalid input is received
     * @param string $invalidMediaName name of media file to play when invalid input is received
     * @param int $maximumDigits maximum number of digits to gather
     * @param int $maximumTries maximum number of times to play the prompt if no input is received
     * @param string $mediaName the name of the media file uploaded to the Media Storage API to play as the gather prompt
     * @param int $minimumDigits minimum number of digits to gather
     * @param bool $stopPlaybackOnDtmf whether to stop the audio playback when a DTMF digit is received
     * @param string $terminatingDigit digit that terminates gathering
     * @param int $timeoutMillis duration in milliseconds to wait for input before timing out
     * @param string $validDigits Digits that are valid for gathering. All other digits will be ignored.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gatherDtmfAudio(
        string $id,
        string $callControlID,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $gatherID = null,
        ?int $initialTimeoutMillis = null,
        int $interDigitTimeoutMillis = 5000,
        ?string $invalidAudioURL = null,
        ?string $invalidMediaName = null,
        int $maximumDigits = 128,
        int $maximumTries = 3,
        ?string $mediaName = null,
        int $minimumDigits = 1,
        bool $stopPlaybackOnDtmf = true,
        string $terminatingDigit = '#',
        int $timeoutMillis = 60000,
        string $validDigits = '0123456789#*',
        RequestOptions|array|null $requestOptions = null,
    ): ActionGatherDtmfAudioResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $audioURL The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     * @param string $mediaName The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param \Telnyx\Conferences\Actions\ActionHoldParams\Region|value-of<\Telnyx\Conferences\Actions\ActionHoldParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function hold(
        string $id,
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        ?string $mediaName = null,
        \Telnyx\Conferences\Actions\ActionHoldParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionHoldResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param bool $endConferenceOnExit Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     * @param bool $hold Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     * @param string $holdAudioURL The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param string $holdMediaName The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param bool $mute Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     * @param \Telnyx\Conferences\Actions\ActionJoinParams\Region|value-of<\Telnyx\Conferences\Actions\ActionJoinParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param bool $softEndConferenceOnExit Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     * @param bool $startConferenceOnEnter Whether the conference should be started after the participant joins the conference. Defaults to "false".
     * @param \Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole|value-of<\Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole> $supervisorRole Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function join(
        string $id,
        string $callControlID,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?bool $mute = null,
        \Telnyx\Conferences\Actions\ActionJoinParams\Region|string|null $region = null,
        ?bool $softEndConferenceOnExit = null,
        ?bool $startConferenceOnEnter = null,
        \Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole|string|null $supervisorRole = null,
        ?array $whisperCallControlIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionJoinResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param \Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled|value-of<\Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled> $beepEnabled Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param \Telnyx\Conferences\Actions\ActionLeaveParams\Region|value-of<\Telnyx\Conferences\Actions\ActionLeaveParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function leave(
        string $id,
        string $callControlID,
        \Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled|string|null $beepEnabled = null,
        ?string $commandID = null,
        \Telnyx\Conferences\Actions\ActionLeaveParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionLeaveResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
     * @param \Telnyx\Conferences\Actions\ActionMuteParams\Region|value-of<\Telnyx\Conferences\Actions\ActionMuteParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function mute(
        string $id,
        ?array $callControlIDs = null,
        \Telnyx\Conferences\Actions\ActionMuteParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $audioURL The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     * @param LoopcountShape $loop The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     * @param string $mediaName The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param \Telnyx\Conferences\Actions\ActionPlayParams\Region|value-of<\Telnyx\Conferences\Actions\ActionPlayParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function play(
        string $id,
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
        \Telnyx\Conferences\Actions\ActionPlayParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionPlayResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to pause specific recording
     * @param \Telnyx\Conferences\Actions\ActionRecordPauseParams\Region|value-of<\Telnyx\Conferences\Actions\ActionRecordPauseParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordPause(
        string $id,
        ?string $commandID = null,
        ?string $recordingID = null,
        \Telnyx\Conferences\Actions\ActionRecordPauseParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRecordPauseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to resume specific recording
     * @param \Telnyx\Conferences\Actions\ActionRecordResumeParams\Region|value-of<\Telnyx\Conferences\Actions\ActionRecordResumeParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordResume(
        string $id,
        ?string $commandID = null,
        ?string $recordingID = null,
        \Telnyx\Conferences\Actions\ActionRecordResumeParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRecordResumeResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference to record by id or name
     * @param Format|value-of<Format> $format The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     * @param string $customFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param bool $playBeep if enabled, a beep sound will be played at the start of a recording
     * @param \Telnyx\Conferences\Actions\ActionRecordStartParams\Region|value-of<\Telnyx\Conferences\Actions\ActionRecordStartParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param Trim|value-of<Trim> $trim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordStart(
        string $id,
        Format|string $format,
        ?string $commandID = null,
        ?string $customFileName = null,
        ?bool $playBeep = null,
        \Telnyx\Conferences\Actions\ActionRecordStartParams\Region|string|null $region = null,
        Trim|string|null $trim = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRecordStartResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference to stop the recording for by id or name
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     * @param \Telnyx\Conferences\Actions\ActionRecordStopParams\Region|value-of<\Telnyx\Conferences\Actions\ActionRecordStopParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordStop(
        string $id,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        \Telnyx\Conferences\Actions\ActionRecordStopParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRecordStopResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param string $digits DTMF digits to send. Valid characters: 0-9, A-D, *, #, w (0.5s pause), W (1s pause).
     * @param list<string> $callControlIDs Array of participant call control IDs to send DTMF to. When empty, DTMF will be sent to all participants.
     * @param string $clientState Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     * @param int $durationMillis duration of each DTMF digit in milliseconds
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $id,
        string $digits,
        ?array $callControlIDs = null,
        ?string $clientState = null,
        int $durationMillis = 250,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSendDtmfResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param string $payload The text or SSML to be converted into speech. There is a 3,000 character limit.
     * @param string $voice Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>` (e.g., `Azure.en-CA-ClaraNeural`, `Azure.en-US-BrianMultilingualNeural`, `Azure.en-US-Ava:DragonHDLatestNeural`). For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery). Use `voice_settings` to configure custom deployments, regions, or API keys.
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     * - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>` (e.g., `Telnyx.KokoroTTS.af`). Use `voice_settings` to configure voice_speed and other synthesis parameters.
     * - **Minimax:** Use `Minimax.<ModelId>.<VoiceId>` (e.g., `Minimax.speech-02-hd.Wise_Woman`). Supported models: `speech-02-turbo`, `speech-02-hd`, `speech-2.6-turbo`, `speech-2.8-turbo`. Use `voice_settings` to configure speed, volume, pitch, and language_boost.
     * - **Rime:** Use `Rime.<model_id>.<voice_id>` (e.g., `Rime.Arcana.cove`). Supported model_ids: `Arcana`, `Mist`. Use `voice_settings` to configure voice_speed.
     * - **Resemble:** Use `Resemble.Turbo.<voice_id>` (e.g., `Resemble.Turbo.my_voice`). Only `Turbo` model is supported. Use `voice_settings` to configure precision, sample_rate, and format.
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     * @param list<string> $callControlIDs Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param Language|value-of<Language> $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param PayloadType|value-of<PayloadType> $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param \Telnyx\Conferences\Actions\ActionSpeakParams\Region|value-of<\Telnyx\Conferences\Actions\ActionSpeakParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param VoiceSettingsShape $voiceSettings The settings associated with the voice selected
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        string $payload,
        string $voice,
        ?array $callControlIDs = null,
        ?string $commandID = null,
        Language|string|null $language = null,
        PayloadType|string $payloadType = 'text',
        \Telnyx\Conferences\Actions\ActionSpeakParams\Region|string|null $region = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
     * @param \Telnyx\Conferences\Actions\ActionStopParams\Region|value-of<\Telnyx\Conferences\Actions\ActionStopParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        ?array $callControlIDs = null,
        \Telnyx\Conferences\Actions\ActionStopParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     * @param \Telnyx\Conferences\Actions\ActionUnholdParams\Region|value-of<\Telnyx\Conferences\Actions\ActionUnholdParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unhold(
        string $id,
        array $callControlIDs,
        \Telnyx\Conferences\Actions\ActionUnholdParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUnholdResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unmuted. When empty all participants will be unmuted.
     * @param \Telnyx\Conferences\Actions\ActionUnmuteParams\Region|value-of<\Telnyx\Conferences\Actions\ActionUnmuteParams\Region> $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unmute(
        string $id,
        ?array $callControlIDs = null,
        \Telnyx\Conferences\Actions\ActionUnmuteParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUnmuteResponse;
}
