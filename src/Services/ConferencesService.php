<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Conferences\ConferenceCreateParams;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams;
use Telnyx\Conferences\ConferenceListParticipantsParams;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceListResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Conferences\ConferenceRetrieveParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConferencesContract;
use Telnyx\Services\Conferences\ActionsService;

final class ConferencesService implements ConferencesContract
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
     * Create a conference from an existing call leg using a `call_control_id` and a conference name. Upon creating the conference, the call will be automatically bridged to the conference. Conferences will expire after all participants have left the conference or after 4 hours regardless of the number of active participants.
     *
     * **Expected Webhooks:**
     *
     * - `conference.created`
     * - `conference.participant.joined`
     * - `conference.participant.left`
     * - `conference.ended`
     * - `conference.recording.saved`
     * - `conference.floor.changed`
     *
     * @param array{
     *   call_control_id: string,
     *   name: string,
     *   beep_enabled?: 'always'|'never'|'on_enter'|'on_exit',
     *   client_state?: string,
     *   comfort_noise?: bool,
     *   command_id?: string,
     *   duration_minutes?: int,
     *   hold_audio_url?: string,
     *   hold_media_name?: string,
     *   max_participants?: int,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     *   start_conference_on_create?: bool,
     * }|ConferenceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ConferenceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceNewResponse {
        [$parsed, $options] = ConferenceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'conferences',
            body: (object) $parsed,
            options: $options,
            convert: ConferenceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an existing conference
     *
     * @param array{
     *   region?: 'Australia'|'Europe'|'Middle East'|'US'
     * }|ConferenceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ConferenceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse {
        [$parsed, $options] = ConferenceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conferences/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: ConferenceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conferences. Conferences are created on demand, and will expire after all participants have left the conference or after 4 hours regardless of the number of active participants. Conferences are listed in descending order by `expires_at`.
     *
     * @param array{
     *   filter?: array{
     *     application_name?: array{contains?: string},
     *     application_session_id?: string,
     *     connection_id?: string,
     *     failed?: bool,
     *     from?: string,
     *     leg_id?: string,
     *     name?: string,
     *     occurred_at?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     'outbound.outbound_voice_profile_id'?: string,
     *     product?: 'call_control'|'fax'|'texml',
     *     status?: 'init'|'in_progress'|'completed',
     *     to?: string,
     *     type?: 'command'|'webhook',
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ConferenceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConferenceListParams $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceListResponse {
        [$parsed, $options] = ConferenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'conferences',
            query: $parsed,
            options: $options,
            convert: ConferenceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param array{
     *   filter?: array{muted?: bool, on_hold?: bool, whispering?: bool},
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ConferenceListParticipantsParams $params
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        array|ConferenceListParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceListParticipantsResponse {
        [$parsed, $options] = ConferenceListParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['conferences/%1$s/participants', $conferenceID],
            query: $parsed,
            options: $options,
            convert: ConferenceListParticipantsResponse::class,
        );
    }
}
