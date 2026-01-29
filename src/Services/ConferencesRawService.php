<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Conferences\Conference;
use Telnyx\Conferences\ConferenceCreateParams;
use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams;
use Telnyx\Conferences\ConferenceListParams\Filter;
use Telnyx\Conferences\ConferenceListParticipantsParams;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Conferences\ConferenceRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConferencesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Conferences\ConferenceListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Conferences\ConferenceListParticipantsParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConferencesRawService implements ConferencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *   beepEnabled?: BeepEnabled|value-of<BeepEnabled>,
     *   clientState?: string,
     *   comfortNoise?: bool,
     *   commandID?: string,
     *   durationMinutes?: int,
     *   holdAudioURL?: string,
     *   holdMediaName?: string,
     *   maxParticipants?: int,
     *   region?: Region|value-of<Region>,
     *   startConferenceOnCreate?: bool,
     * }|ConferenceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ConferenceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Uniquely identifies the conference by id
     * @param array{
     *   region?: ConferenceRetrieveParams\Region|value-of<ConferenceRetrieveParams\Region>,
     * }|ConferenceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ConferenceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   region?: ConferenceListParams\Region|value-of<ConferenceListParams\Region>,
     * }|ConferenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Conference>>
     *
     * @throws APIException
     */
    public function list(
        array|ConferenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'conferences',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Conference::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param string $conferenceID Uniquely identifies the conference by id
     * @param array{
     *   filter?: ConferenceListParticipantsParams\Filter|FilterShape1,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   region?: ConferenceListParticipantsParams\Region|value-of<ConferenceListParticipantsParams\Region>,
     * }|ConferenceListParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ConferenceListParticipantsResponse>>
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        array|ConferenceListParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceListParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['conferences/%1$s/participants', $conferenceID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ConferenceListParticipantsResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
