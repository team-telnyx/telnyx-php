<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallsContract;
use Telnyx\Services\Calls\ActionsService;

final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Dial a number or SIP URI from a given connection. A successful response will include a `call_leg_id` which can be used to correlate the command with subsequent webhooks.
     *
     * **Expected Webhooks:**
     *
     * - `call.initiated`
     * - `call.answered` or `call.hangup`
     * - `call.machine.detection.ended` if `answering_machine_detection` was requested
     * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
     * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
     * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
     *
     * @param array{
     *   connection_id: string,
     *   from: string,
     *   to: string|list<string>,
     *   answering_machine_detection?: "premium"|"detect"|"detect_beep"|"detect_words"|"greeting_end"|"disabled",
     *   answering_machine_detection_config?: array{
     *     after_greeting_silence_millis?: int,
     *     between_words_silence_millis?: int,
     *     greeting_duration_millis?: int,
     *     greeting_silence_duration_millis?: int,
     *     greeting_total_analysis_time_millis?: int,
     *     initial_silence_millis?: int,
     *     maximum_number_of_words?: int,
     *     maximum_word_length_millis?: int,
     *     silence_threshold?: int,
     *     total_analysis_time_millis?: int,
     *   },
     *   audio_url?: string,
     *   billing_group_id?: string,
     *   bridge_intent?: bool,
     *   bridge_on_answer?: bool,
     *   client_state?: string,
     *   command_id?: string,
     *   conference_config?: array{
     *     id?: string,
     *     beep_enabled?: "always"|"never"|"on_enter"|"on_exit",
     *     conference_name?: string,
     *     early_media?: bool,
     *     end_conference_on_exit?: bool,
     *     hold?: bool,
     *     hold_audio_url?: string,
     *     hold_media_name?: string,
     *     mute?: bool,
     *     soft_end_conference_on_exit?: bool,
     *     start_conference_on_create?: bool,
     *     start_conference_on_enter?: bool,
     *     supervisor_role?: "barge"|"monitor"|"none"|"whisper",
     *     whisper_call_control_ids?: list<string>,
     *   },
     *   custom_headers?: list<array{name: string, value: string}|CustomSipHeader>,
     *   dialogflow_config?: array{
     *     analyze_sentiment?: bool, partial_automated_agent_reply?: bool
     *   },
     *   enable_dialogflow?: bool,
     *   from_display_name?: string,
     *   link_to?: string,
     *   media_encryption?: "disabled"|"SRTP"|"DTLS",
     *   media_name?: string,
     *   park_after_unbridge?: string,
     *   preferred_codecs?: string,
     *   record?: "record-from-answer",
     *   record_channels?: "single"|"dual",
     *   record_custom_file_name?: string,
     *   record_format?: "wav"|"mp3",
     *   record_max_length?: int,
     *   record_timeout_secs?: int,
     *   record_track?: "both"|"inbound"|"outbound",
     *   record_trim?: "trim-silence",
     *   send_silence_when_idle?: bool,
     *   sip_auth_password?: string,
     *   sip_auth_username?: string,
     *   sip_headers?: list<array{name: "User-to-User", value: string}|SipHeader>,
     *   sip_region?: "US"|"Europe"|"Canada"|"Australia"|"Middle East",
     *   sip_transport_protocol?: "UDP"|"TCP"|"TLS",
     *   sound_modifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   stream_bidirectional_codec?: "PCMU"|"PCMA"|"G722"|"OPUS"|"AMR-WB"|"L16",
     *   stream_bidirectional_mode?: "mp3"|"rtp",
     *   stream_bidirectional_sampling_rate?: 8000|16000|22050|24000|48000,
     *   stream_bidirectional_target_legs?: "both"|"self"|"opposite",
     *   stream_codec?: "PCMU"|"PCMA"|"G722"|"OPUS"|"AMR-WB"|"L16"|"default",
     *   stream_establish_before_call_originate?: bool,
     *   stream_track?: "inbound_track"|"outbound_track"|"both_tracks",
     *   stream_url?: string,
     *   supervise_call_control_id?: string,
     *   supervisor_role?: "barge"|"whisper"|"monitor",
     *   time_limit_secs?: int,
     *   timeout_secs?: int,
     *   transcription?: bool,
     *   transcription_config?: array{
     *     client_state?: string,
     *     command_id?: string,
     *     transcription_engine?: "Google"|"Telnyx"|"Deepgram"|"A"|"B",
     *     transcription_engine_config?: array<string,mixed>,
     *     transcription_tracks?: string,
     *   },
     *   webhook_url?: string,
     *   webhook_url_method?: "POST"|"GET",
     * }|CallDialParams $params
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        ?RequestOptions $requestOptions = null
    ): CallDialResponse {
        [$parsed, $options] = CallDialParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'calls',
            body: (object) $parsed,
            options: $options,
            convert: CallDialResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of a call (data is available 10 minutes after call ended).
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        ?RequestOptions $requestOptions = null
    ): CallGetStatusResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['calls/%1$s', $callControlID],
            options: $requestOptions,
            convert: CallGetStatusResponse::class,
        );
    }
}
