<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Conferences;

use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Conferences\Actions\ActionHoldResponse;
use Telnyx\Conferences\Actions\ActionJoinParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole as SupervisorRole1;
use Telnyx\Conferences\Actions\ActionJoinResponse;
use Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled as BeepEnabled1;
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
use Telnyx\Conferences\Actions\ActionUpdateParams\SupervisorRole;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     */
    public function update(
        string $id,
        $callControlID,
        $supervisorRole,
        $commandID = omit,
        $whisperCallControlIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @param string $audioURL The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     * @param string $mediaName The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function hold(
        string $id,
        $audioURL = omit,
        $callControlIDs = omit,
        $mediaName = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionHoldResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param bool $endConferenceOnExit Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     * @param bool $hold Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     * @param string $holdAudioURL The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param string $holdMediaName The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     * @param bool $mute Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     * @param bool $softEndConferenceOnExit Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     * @param bool $startConferenceOnEnter Whether the conference should be started after the participant joins the conference. Defaults to "false".
     * @param SupervisorRole1|value-of<SupervisorRole1> $supervisorRole Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     * @param list<string> $whisperCallControlIDs Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     */
    public function join(
        string $id,
        $callControlID,
        $beepEnabled = omit,
        $clientState = omit,
        $commandID = omit,
        $endConferenceOnExit = omit,
        $hold = omit,
        $holdAudioURL = omit,
        $holdMediaName = omit,
        $mute = omit,
        $softEndConferenceOnExit = omit,
        $startConferenceOnEnter = omit,
        $supervisorRole = omit,
        $whisperCallControlIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionJoinResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param BeepEnabled1|value-of<BeepEnabled1> $beepEnabled Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function leave(
        string $id,
        $callControlID,
        $beepEnabled = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveResponse;

    /**
     * @api
     *
     * @param list<string> $callControlIDs Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
     */
    public function mute(
        string $id,
        $callControlIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param string $audioURL The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     * @param string|int $loop The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     * @param string $mediaName The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function play(
        string $id,
        $audioURL = omit,
        $callControlIDs = omit,
        $loop = omit,
        $mediaName = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionPlayResponse;

    /**
     * @api
     *
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to pause specific recording
     */
    public function recordPause(
        string $id,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordPauseResponse;

    /**
     * @api
     *
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID use this field to resume specific recording
     */
    public function recordResume(
        string $id,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordResumeResponse;

    /**
     * @api
     *
     * @param Format|value-of<Format> $format The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     * @param string $customFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param bool $playBeep if enabled, a beep sound will be played at the start of a recording
     * @param Trim|value-of<Trim> $trim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     */
    public function recordStart(
        string $id,
        $format,
        $commandID = omit,
        $customFileName = omit,
        $playBeep = omit,
        $trim = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStartResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     */
    public function recordStop(
        string $id,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStopResponse;

    /**
     * @api
     *
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
     * @param Language|value-of<Language> $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param PayloadType|value-of<PayloadType> $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     */
    public function speak(
        string $id,
        $payload,
        $voice,
        $callControlIDs = omit,
        $commandID = omit,
        $language = omit,
        $payloadType = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param list<string> $callControlIDs List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
     */
    public function stop(
        string $id,
        $callControlIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopResponse;

    /**
     * @api
     *
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     */
    public function unhold(
        string $id,
        $callControlIDs,
        ?RequestOptions $requestOptions = null
    ): ActionUnholdResponse;

    /**
     * @api
     *
     * @param list<string> $callControlIDs List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unmuted. When empty all participants will be unmuted.
     */
    public function unmute(
        string $id,
        $callControlIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;
}
