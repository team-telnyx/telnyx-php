<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams;
use Telnyx\Recordings\RecordingResponseData;
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['recordings/%1$s', $recordingID],
            options: $requestOptions,
            convert: RecordingGetResponse::class,
        );
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
     * @return DefaultPagination<RecordingResponseData>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = RecordingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'recordings',
            query: $parsed,
            options: $options,
            convert: RecordingResponseData::class,
            page: DefaultPagination::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['recordings/%1$s', $recordingID],
            options: $requestOptions,
            convert: RecordingDeleteResponse::class,
        );
    }
}
