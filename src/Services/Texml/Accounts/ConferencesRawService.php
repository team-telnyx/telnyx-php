<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\ConferencesRawContract;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\TexmlGetCallRecordingsResponseBody;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceResource;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams\Status;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Returns a single conference resource for the account by its ConferenceSid.
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ConferenceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceResource>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        array|ConferenceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: ConferenceResource::class,
        );
    }

    /**
     * @api
     *
     * Updates the specified conference resource, for example to modify its status, and returns the updated conference.
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param array{
     *   accountSid: string,
     *   announceMethod?: AnnounceMethod|value-of<AnnounceMethod>,
     *   announceURL?: string,
     *   status?: string,
     * }|ConferenceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceResource>
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        array|ConferenceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: ConferenceResource::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of conference resources for the account, with support for filtering by friendly name, status, and creation or update dates.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{
     *   dateCreated?: string,
     *   dateUpdated?: string,
     *   friendlyName?: string,
     *   page?: int,
     *   pageSize?: int,
     *   pageToken?: string,
     *   status?: Status|value-of<Status>,
     * }|ConferenceRetrieveConferencesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceGetConferencesResponse>
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        array|ConferenceRetrieveConferencesParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * Returns the list of recordings made for the specified conference.
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ConferenceRetrieveRecordingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceGetRecordingsResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingsResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: TexmlGetCallRecordingsResponseBody::class,
        );
    }
}
