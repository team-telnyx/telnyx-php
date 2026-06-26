<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingResponseData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingsRawContract;

/**
 * Call Recordings operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Recordings\RecordingListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsRawService implements RecordingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the details of an existing call recording.
     *
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|RecordingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RecordingResponseData>>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecordingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'recordings',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: RecordingResponseData::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a call recording.
     *
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['recordings/%1$s', $recordingID],
            options: $requestOptions,
            convert: RecordingDeleteResponse::class,
        );
    }
}
