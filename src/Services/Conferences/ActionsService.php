<?php

declare(strict_types=1);

namespace Telnyx\Services\Conferences;

use Telnyx\Client;
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
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Conferences\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Update conference participant supervisor_role
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param 'barge'|'monitor'|'none'|'whisper'|SupervisorRole $supervisorRole Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $callControlID,
        string|SupervisorRole $supervisorRole,
        ?string $commandID = null,
        string|Region|null $region = null,
        ?array $whisperCallControlIDs = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse {
        $params = [
            'callControlID' => $callControlID,
            'supervisorRole' => $supervisorRole,
            'commandID' => $commandID,
            'region' => $region,
            'whisperCallControlIDs' => $whisperCallControlIDs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Hold a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $audioURL The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     * @param string $mediaName The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionHoldParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function hold(
        string $id,
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        ?string $mediaName = null,
        string|\Telnyx\Conferences\Actions\ActionHoldParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionHoldResponse {
        $params = [
            'audioURL' => $audioURL,
            'callControlIDs' => $callControlIDs,
            'mediaName' => $mediaName,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->hold($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Join an existing call leg to a conference. Issue the Join Conference command with the conference ID in the path and the `call_control_id` of the leg you wish to join to the conference as an attribute. The conference can have up to a certain amount of active participants, as set by the `max_participants` parameter in conference creation request.
     *
     * **Expected Webhooks:**
     *
     * - `conference.participant.joined`
     * - `conference.participant.left`
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param 'always'|'never'|'on_enter'|'on_exit'|BeepEnabled $beepEnabled Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param bool $endConferenceOnExit Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     * @param bool $hold Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     * @param string $holdAudioURL The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param string $holdMediaName The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param bool $mute Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionJoinParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param bool $softEndConferenceOnExit Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     * @param bool $startConferenceOnEnter Whether the conference should be started after the participant joins the conference. Defaults to "false".
     * @param 'barge'|'monitor'|'none'|'whisper'|\Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole $supervisorRole Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @throws APIException
     */
    public function join(
        string $id,
        string $callControlID,
        string|BeepEnabled|null $beepEnabled = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?bool $mute = null,
        string|\Telnyx\Conferences\Actions\ActionJoinParams\Region|null $region = null,
        ?bool $softEndConferenceOnExit = null,
        ?bool $startConferenceOnEnter = null,
        string|\Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole|null $supervisorRole = null,
        ?array $whisperCallControlIDs = null,
        ?RequestOptions $requestOptions = null,
    ): ActionJoinResponse {
        $params = [
            'callControlID' => $callControlID,
            'beepEnabled' => $beepEnabled,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'endConferenceOnExit' => $endConferenceOnExit,
            'hold' => $hold,
            'holdAudioURL' => $holdAudioURL,
            'holdMediaName' => $holdMediaName,
            'mute' => $mute,
            'region' => $region,
            'softEndConferenceOnExit' => $softEndConferenceOnExit,
            'startConferenceOnEnter' => $startConferenceOnEnter,
            'supervisorRole' => $supervisorRole,
            'whisperCallControlIDs' => $whisperCallControlIDs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->join($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a call leg from a conference and moves it back to parked state.
     *
     * **Expected Webhooks:**
     *
     * - `conference.participant.left`
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param 'always'|'never'|'on_enter'|'on_exit'|\Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled $beepEnabled Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionLeaveParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function leave(
        string $id,
        string $callControlID,
        string|\Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled|null $beepEnabled = null,
        ?string $commandID = null,
        string|\Telnyx\Conferences\Actions\ActionLeaveParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveResponse {
        $params = [
            'callControlID' => $callControlID,
            'beepEnabled' => $beepEnabled,
            'commandID' => $commandID,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->leave($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mute a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionMuteParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function mute(
        string $id,
        ?array $callControlIDs = null,
        string|\Telnyx\Conferences\Actions\ActionMuteParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        $params = ['callControlIDs' => $callControlIDs, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->mute($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Play audio to all or some participants on a conference call.
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param string $audioURL The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     * @param string|int $loop The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     * @param string $mediaName The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionPlayParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function play(
        string $id,
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
        string|\Telnyx\Conferences\Actions\ActionPlayParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionPlayResponse {
        $params = [
            'audioURL' => $audioURL,
            'callControlIDs' => $callControlIDs,
            'loop' => $loop,
            'mediaName' => $mediaName,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->play($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause conference recording.
     *
     * @param string $id Specifies the conference by id or name
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to pause specific recording
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionRecordPauseParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function recordPause(
        string $id,
        ?string $commandID = null,
        ?string $recordingID = null,
        string|\Telnyx\Conferences\Actions\ActionRecordPauseParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordPauseResponse {
        $params = [
            'commandID' => $commandID,
            'recordingID' => $recordingID,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordPause($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume conference recording.
     *
     * @param string $id Specifies the conference by id or name
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to resume specific recording
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionRecordResumeParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function recordResume(
        string $id,
        ?string $commandID = null,
        ?string $recordingID = null,
        string|\Telnyx\Conferences\Actions\ActionRecordResumeParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordResumeResponse {
        $params = [
            'commandID' => $commandID,
            'recordingID' => $recordingID,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordResume($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start recording the conference. Recording will stop on conference end, or via the Stop Recording command.
     *
     * **Expected Webhooks:**
     *
     * - `conference.recording.saved`
     *
     * @param string $id Specifies the conference to record by id or name
     * @param 'wav'|'mp3'|Format $format The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     * @param string $customFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param bool $playBeep if enabled, a beep sound will be played at the start of a recording
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionRecordStartParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param 'trim-silence'|Trim $trim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     *
     * @throws APIException
     */
    public function recordStart(
        string $id,
        string|Format $format,
        ?string $commandID = null,
        ?string $customFileName = null,
        ?bool $playBeep = null,
        string|\Telnyx\Conferences\Actions\ActionRecordStartParams\Region|null $region = null,
        string|Trim|null $trim = null,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStartResponse {
        $params = [
            'format' => $format,
            'commandID' => $commandID,
            'customFileName' => $customFileName,
            'playBeep' => $playBeep,
            'region' => $region,
            'trim' => $trim,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordStart($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop recording the conference.
     *
     * **Expected Webhooks:**
     *
     * - `conference.recording.saved`
     *
     * @param string $id Specifies the conference to stop the recording for by id or name
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionRecordStopParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function recordStop(
        string $id,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        string|\Telnyx\Conferences\Actions\ActionRecordStopParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStopResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
            'region' => $region,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordStop($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Convert text to speech and play it to all or some participants.
     *
     * @param string $id Specifies the conference by id or name
     * @param string $payload The text or SSML to be converted into speech. There is a 3,000 character limit.
     * @param string $voice Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     * @param list<string> $callControlIDs Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param 'arb'|'cmn-CN'|'cy-GB'|'da-DK'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IN'|'en-US'|'es-ES'|'es-MX'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|Language $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param 'text'|'ssml'|PayloadType $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionSpeakParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param array<string,mixed> $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        string $payload,
        string $voice,
        ?array $callControlIDs = null,
        ?string $commandID = null,
        string|Language|null $language = null,
        string|PayloadType $payloadType = 'text',
        string|\Telnyx\Conferences\Actions\ActionSpeakParams\Region|null $region = null,
        ?array $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse {
        $params = [
            'payload' => $payload,
            'voice' => $voice,
            'callControlIDs' => $callControlIDs,
            'commandID' => $commandID,
            'language' => $language,
            'payloadType' => $payloadType,
            'region' => $region,
            'voiceSettings' => $voiceSettings,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->speak($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop audio being played to all or some participants on a conference call.
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionStopParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        ?array $callControlIDs = null,
        string|\Telnyx\Conferences\Actions\ActionStopParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopResponse {
        $params = ['callControlIDs' => $callControlIDs, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stop($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unhold a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionUnholdParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function unhold(
        string $id,
        array $callControlIDs,
        string|\Telnyx\Conferences\Actions\ActionUnholdParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUnholdResponse {
        $params = ['callControlIDs' => $callControlIDs, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unhold($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unmute a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unmuted. When empty all participants will be unmuted.
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\Actions\ActionUnmuteParams\Region $region Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @throws APIException
     */
    public function unmute(
        string $id,
        ?array $callControlIDs = null,
        string|\Telnyx\Conferences\Actions\ActionUnmuteParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        $params = ['callControlIDs' => $callControlIDs, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unmute($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
