<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Recordings\Json\JsonDeleteRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Recordings\Json\JsonRetrieveRecordingSidJsonParams;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

interface JsonRawContract
{
    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array<mixed>|JsonDeleteRecordingSidJsonParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        array|JsonDeleteRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array<mixed>|JsonRetrieveRecordingSidJsonParams $params
     *
     * @return BaseResponse<TexmlGetCallRecordingResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        array|JsonRetrieveRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
