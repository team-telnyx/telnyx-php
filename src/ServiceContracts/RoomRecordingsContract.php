<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

interface RoomRecordingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomRecordingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|RoomRecordingDeleteBulkParams $params
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse;
}
