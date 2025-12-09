<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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

final class ConferencesService implements ConferencesContract
{
    /**
     * @api
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
     * @param array{accountSid: string}|ConferenceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        array|ConferenceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse {
        [$parsed, $options] = ConferenceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ConferenceGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a conference resource.
     *
     * @param array{
     *   accountSid: string,
     *   announceMethod?: 'GET'|'POST'|AnnounceMethod,
     *   announceURL?: string,
     *   status?: string,
     * }|ConferenceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        array|ConferenceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceUpdateResponse {
        [$parsed, $options] = ConferenceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ConferenceUpdateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['accountSid']),
            options: $options,
            convert: ConferenceUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference resources.
     *
     * @param array{
     *   dateCreated?: string,
     *   dateUpdated?: string,
     *   friendlyName?: string,
     *   page?: int,
     *   pageSize?: int,
     *   pageToken?: string,
     *   status?: 'init'|'in-progress'|'completed'|Status,
     * }|ConferenceRetrieveConferencesParams $params
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        array|ConferenceRetrieveConferencesParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetConferencesResponse {
        [$parsed, $options] = ConferenceRetrieveConferencesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ConferenceGetConferencesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Conferences', $accountSid],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'dateCreated' => 'DateCreated',
                    'dateUpdated' => 'DateUpdated',
                    'friendlyName' => 'FriendlyName',
                    'page' => 'Page',
                    'pageSize' => 'PageSize',
                    'pageToken' => 'PageToken',
                    'status' => 'Status',
                ],
            ),
            options: $options,
            convert: ConferenceGetConferencesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference recordings
     *
     * @param array{accountSid: string}|ConferenceRetrieveRecordingsParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ConferenceGetRecordingsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Recordings',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetRecordingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recordings for a conference identified by conference_sid.
     *
     * @param array{accountSid: string}|ConferenceRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetRecordingsJsonResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ConferenceGetRecordingsJsonResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Recordings.json',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ConferenceGetRecordingsJsonResponse::class,
        );

        return $response->parse();
    }
}
