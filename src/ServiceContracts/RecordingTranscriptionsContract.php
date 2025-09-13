<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;

interface RecordingTranscriptionsContract
{
    /**
     * @api
     *
     * @return RecordingTranscriptionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $recordingTranscriptionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $recordingTranscriptionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingTranscriptionDeleteResponse;
}
