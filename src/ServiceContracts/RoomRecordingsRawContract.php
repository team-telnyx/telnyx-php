<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

interface RoomRecordingsRawContract
{
    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     *
     * @return BaseResponse<RoomRecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomRecordingListParams $params
     *
     * @return BaseResponse<RoomRecordingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomRecordingDeleteBulkParams $params
     *
     * @return BaseResponse<RoomRecordingDeleteBulkResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
