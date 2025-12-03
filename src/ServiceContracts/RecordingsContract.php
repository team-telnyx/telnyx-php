<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams;
use Telnyx\Recordings\RecordingResponseData;
use Telnyx\RequestOptions;

interface RecordingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RecordingListParams $params
     *
     * @return DefaultPagination<RecordingResponseData>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingDeleteResponse;
}
