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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConferencesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ConferenceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ConferenceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id
     * @param array<string,mixed>|ConferenceRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ConferenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Conference>>
     *
     * @throws APIException
     */
    public function list(
        array|ConferenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceID Uniquely identifies the conference by id
     * @param array<string,mixed>|ConferenceListParticipantsParams $params
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
    ): BaseResponse;
}
