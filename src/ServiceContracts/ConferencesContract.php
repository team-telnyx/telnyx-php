<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Conferences\Conference;
use Telnyx\Conferences\ConferenceCreateParams;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams;
use Telnyx\Conferences\ConferenceListParticipantsParams;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Conferences\ConferenceRetrieveParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<Conference>
     *
     * @throws APIException
     */
    public function list(
        array|ConferenceListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceListParticipantsParams $params
     *
     * @return DefaultPagination<ConferenceListParticipantsResponse>
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        array|ConferenceListParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
