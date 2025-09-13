<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface ConferencesContract
{
    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return ConferenceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConferenceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param string $accountSid
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param string $status The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     *
     * @return ConferenceUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        $accountSid,
        $announceMethod = omit,
        $announceURL = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): ConferenceUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConferenceUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceUpdateResponse;

    /**
     * @api
     *
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param string $friendlyName filters conferences by their friendly name
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param Status|value-of<Status> $status filters conferences by status
     *
     * @return ConferenceGetConferencesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        $dateCreated = omit,
        $dateUpdated = omit,
        $friendlyName = omit,
        $page = omit,
        $pageSize = omit,
        $pageToken = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetConferencesResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConferenceGetConferencesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConferencesRaw(
        string $accountSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetConferencesResponse;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return ConferenceGetRecordingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConferenceGetRecordingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsResponse;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return ConferenceGetRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConferenceGetRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJsonRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse;
}
