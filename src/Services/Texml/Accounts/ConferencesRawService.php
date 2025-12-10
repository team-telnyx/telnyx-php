<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\ConferencesRawContract;
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

final class ConferencesRawService implements ConferencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a conference resource.
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ConferenceRetrieveParams $params
     *
     * @return BaseResponse<ConferenceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        array|ConferenceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

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
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param array{
     *   accountSid: string,
     *   announceMethod?: 'GET'|'POST'|AnnounceMethod,
     *   announceURL?: string,
     *   status?: string,
     * }|ConferenceUpdateParams $params
     *
     * @return BaseResponse<ConferenceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        array|ConferenceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s', $accountSid, $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: ConferenceUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference resources.
     *
     * @param string $accountSid the id of the account the resource belongs to
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
     * @return BaseResponse<ConferenceGetConferencesResponse>
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        array|ConferenceRetrieveConferencesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceRetrieveConferencesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Lists conference recordings
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ConferenceRetrieveRecordingsParams $params
     *
     * @return BaseResponse<ConferenceGetRecordingsResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

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
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ConferenceRetrieveRecordingsJsonParams $params
     *
     * @return BaseResponse<ConferenceGetRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConferenceRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

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
