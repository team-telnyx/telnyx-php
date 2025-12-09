<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\ConferencesContract;
use Telnyx\Services\Texml\Accounts\Conferences\ParticipantsService;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateResponse;

final class ConferencesService implements ConferencesContract
{
    /**
     * @api
     */
    public ConferencesRawService $raw;

    /**
     * @api
     */
    public ParticipantsService $participants;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConferencesRawService($client);
        $this->participants = new ParticipantsService($client);
    }

    /**
     * @api
     *
     * Returns a conference resource.
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        string $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse {
        $params = ['accountSid' => $accountSid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($conferenceSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a conference resource.
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param 'GET'|'POST'|AnnounceMethod $announceMethod Body param: The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL Body param: The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param string $status Body param: The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        string $accountSid,
        string|AnnounceMethod|null $announceMethod = null,
        ?string $announceURL = null,
        ?string $status = null,
        ?RequestOptions $requestOptions = null,
    ): ConferenceUpdateResponse {
        $params = [
            'accountSid' => $accountSid,
            'announceMethod' => $announceMethod,
            'announceURL' => $announceURL,
            'status' => $status,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($conferenceSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference resources.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param string $friendlyName filters conferences by their friendly name
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param 'init'|'in-progress'|'completed'|Status $status filters conferences by status
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
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetConferencesResponse {
        $params = [
            'dateCreated' => $dateCreated,
            'dateUpdated' => $dateUpdated,
            'friendlyName' => $friendlyName,
            'page' => $page,
            'pageSize' => $pageSize,
            'pageToken' => $pageToken,
            'status' => $status,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveConferences($accountSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference recordings
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        string $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsResponse {
        $params = ['accountSid' => $accountSid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordings($conferenceSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recordings for a conference identified by conference_sid.
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param string $accountSid the id of the account the resource belongs to
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        string $accountSid,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse {
        $params = ['accountSid' => $accountSid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingsJson($conferenceSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
