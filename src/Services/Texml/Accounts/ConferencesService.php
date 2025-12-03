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
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;
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
     * @param array{account_sid: string}|ConferenceRetrieveParams $params
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   account_sid: string,
     *   AnnounceMethod?: 'GET'|'POST',
     *   AnnounceUrl?: string,
     *   Status?: string,
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
            options: $options,
            convert: ConferenceUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference resources.
     *
     * @param array{
     *   DateCreated?: string,
     *   DateUpdated?: string,
     *   FriendlyName?: string,
     *   Page?: int,
     *   PageSize?: int,
     *   PageToken?: string,
     *   Status?: 'init'|'in-progress'|'completed',
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

        // @phpstan-ignore-next-line return.type
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
     * @param array{account_sid: string}|ConferenceRetrieveRecordingsParams $params
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{account_sid: string}|ConferenceRetrieveRecordingsJsonParams $params
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        // @phpstan-ignore-next-line return.type
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
