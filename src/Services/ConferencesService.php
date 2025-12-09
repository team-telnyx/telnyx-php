<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Conferences\ConferenceCreateParams;
use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams;
use Telnyx\Conferences\ConferenceListParams\Filter\Product;
use Telnyx\Conferences\ConferenceListParams\Filter\Status;
use Telnyx\Conferences\ConferenceListParams\Filter\Type;
use Telnyx\Conferences\ConferenceListParticipantsParams;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceListResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Conferences\ConferenceRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
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
     *   callControlID: string,
     *   name: string,
     *   beepEnabled?: 'always'|'never'|'on_enter'|'on_exit'|BeepEnabled,
     *   clientState?: string,
     *   comfortNoise?: bool,
     *   commandID?: string,
     *   durationMinutes?: int,
     *   holdAudioURL?: string,
     *   holdMediaName?: string,
     *   maxParticipants?: int,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US'|Region,
     *   startConferenceOnCreate?: bool,
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

        /** @var BaseResponse<ConferenceNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'conferences',
            body: (object) $parsed,
            options: $options,
            convert: ConferenceNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an existing conference
     *
     * @param array{
     *   region?: 'Australia'|'Europe'|'Middle East'|'US'|ConferenceRetrieveParams\Region,
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

        /** @var BaseResponse<ConferenceGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['conferences/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: ConferenceGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conferences. Conferences are created on demand, and will expire after all participants have left the conference or after 4 hours regardless of the number of active participants. Conferences are listed in descending order by `expires_at`.
     *
     * @param array{
     *   filter?: array{
     *     applicationName?: array{contains?: string},
     *     applicationSessionID?: string,
     *     connectionID?: string,
     *     failed?: bool,
     *     from?: string,
     *     legID?: string,
     *     name?: string,
     *     occurredAt?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     outboundOutboundVoiceProfileID?: string,
     *     product?: 'call_control'|'fax'|'texml'|Product,
     *     status?: 'init'|'in_progress'|'completed'|Status,
     *     to?: string,
     *     type?: 'command'|'webhook'|Type,
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   region?: 'Australia'|'Europe'|'Middle East'|'US'|ConferenceListParams\Region,
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

        /** @var BaseResponse<ConferenceListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'conferences',
            query: $parsed,
            options: $options,
            convert: ConferenceListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param array{
     *   filter?: array{muted?: bool, onHold?: bool, whispering?: bool},
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   region?: 'Australia'|'Europe'|'Middle East'|'US'|ConferenceListParticipantsParams\Region,
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

        /** @var BaseResponse<ConferenceListParticipantsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['conferences/%1$s/participants', $conferenceID],
            query: $parsed,
            options: $options,
            convert: ConferenceListParticipantsResponse::class,
        );

        return $response->parse();
    }
}
