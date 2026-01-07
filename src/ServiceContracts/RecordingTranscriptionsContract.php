<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecordingTranscriptionsContract
{
    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): RecordingTranscriptionListResponse;

    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingTranscriptionDeleteResponse;
}
