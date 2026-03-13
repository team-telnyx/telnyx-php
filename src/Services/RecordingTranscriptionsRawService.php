<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RecordingTranscriptions\RecordingTranscription;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingTranscriptionsRawContract;

/**
 * Call Recordings operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingTranscriptionsRawService implements RecordingTranscriptionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the details of an existing recording transcription.
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingTranscriptionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your recording transcriptions.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|RecordingTranscriptionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RecordingTranscription>>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingTranscriptionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecordingTranscriptionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'recording_transcriptions',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: RecordingTranscription::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingTranscriptionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionDeleteResponse::class,
        );
    }
}
