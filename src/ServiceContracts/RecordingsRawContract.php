<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams;
use Telnyx\Recordings\RecordingListResponse;
use Telnyx\RequestOptions;

interface RecordingsRawContract
{
    /**
     * @api
     *
     * @param string $recordingID uniquely identifies the recording by id
     *
     * @return BaseResponse<RecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RecordingListParams $params
     *
     * @return BaseResponse<RecordingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordingID uniquely identifies the recording by id
     *
     * @return BaseResponse<RecordingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
