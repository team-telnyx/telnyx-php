<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams;
use Telnyx\Recordings\RecordingListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingsContract;
use Telnyx\Services\Recordings\ActionsService;

final class RecordingsService implements RecordingsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call recording.
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingGetResponse {
        /** @var BaseResponse<RecordingGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['recordings/%1$s', $recordingID],
            options: $requestOptions,
            convert: RecordingGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your call recordings.
     *
     * @param array{
     *   filter?: array{
     *     call_leg_id?: string,
     *     call_session_id?: string,
     *     conference_id?: string,
     *     connection_id?: string,
     *     created_at?: array{gte?: string, lte?: string},
     *     from?: string,
     *     sip_call_id?: string,
     *     to?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RecordingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RecordingListParams $params,
        ?RequestOptions $requestOptions = null
    ): RecordingListResponse {
        [$parsed, $options] = RecordingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RecordingListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'recordings',
            query: $parsed,
            options: $options,
            convert: RecordingListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a call recording.
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingDeleteResponse {
        /** @var BaseResponse<RecordingDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['recordings/%1$s', $recordingID],
            options: $requestOptions,
            convert: RecordingDeleteResponse::class,
        );

        return $response->parse();
    }
}
