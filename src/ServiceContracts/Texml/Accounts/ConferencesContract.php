<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConferencesContract
{
    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod Body param: The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL Body param: The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param string $status Body param: The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        string $accountSid,
        AnnounceMethod|string|null $announceMethod = null,
        ?string $announceURL = null,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceUpdateResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param string $friendlyName filters conferences by their friendly name
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param Status|value-of<Status> $status filters conferences by status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?string $friendlyName = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceGetConferencesResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceGetRecordingsResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse;
}
