<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomRecordingsRawContract
{
    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomRecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RoomRecordingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<RoomRecordingListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RoomRecordingDeleteBulkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomRecordingDeleteBulkResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
