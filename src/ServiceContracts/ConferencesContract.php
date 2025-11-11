<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface ConferencesContract
{
    /**
     * @api
     *
     * @param array<mixed>|ConferenceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ConferenceCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ConferenceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConferenceListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceListResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceListParticipantsParams $params
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        array|ConferenceListParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceListParticipantsResponse;
}
