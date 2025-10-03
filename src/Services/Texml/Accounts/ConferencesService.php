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
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateResponse;

use const Telnyx\Core\OMIT as omit;

final class ConferencesService implements ConferencesContract
{
    /**
     * @@api
     */
    public ParticipantsService $participants;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->participants = new ParticipantsService($client);
    }

    /**
     * @api
     *
     * Returns a conference resource.
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetResponse {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRaw($conferenceSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetResponse {
        [$parsed, $options] = ConferenceRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a conference resource.
     *
     * @param string $accountSid
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     * @param string $announceURL The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     * @param string $status The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
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
    ): ConferenceUpdateResponse {
        $params = [
            'accountSid' => $accountSid,
            'announceMethod' => $announceMethod,
            'announceURL' => $announceURL,
            'status' => $status,
        ];

        return $this->updateRaw($conferenceSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceUpdateResponse {
        [$parsed, $options] = ConferenceUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['accountSid']),
            options: $options,
            convert: ConferenceUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference resources.
     *
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param string $friendlyName filters conferences by their friendly name
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param Status|value-of<Status> $status filters conferences by status
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

        return $this->retrieveConferencesRaw($accountSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveConferencesRaw(
        string $accountSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetConferencesResponse {
        [$parsed, $options] = ConferenceRetrieveConferencesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Conferences', $accountSid],
            query: $parsed,
            options: $options,
            convert: ConferenceGetConferencesResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference recordings
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetRecordingsResponse {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRecordingsRaw(
            $conferenceSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetRecordingsResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Recordings',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetRecordingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns recordings for a conference identified by conference_sid.
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetRecordingsJsonResponse {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRecordingsJsonRaw(
            $conferenceSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJsonRaw(
        string $conferenceSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetRecordingsJsonResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Recordings.json',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetRecordingsJsonResponse::class,
        );
    }
}
