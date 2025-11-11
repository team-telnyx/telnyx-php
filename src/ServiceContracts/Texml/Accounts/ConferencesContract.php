<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateResponse;

interface ConferencesContract
{
    /**
     * @api
     *
     * @param array<mixed>|ConferenceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        array|ConferenceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        array|ConferenceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceRetrieveConferencesParams $params
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        array|ConferenceRetrieveConferencesParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetConferencesResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceRetrieveRecordingsParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConferenceRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse;
}
