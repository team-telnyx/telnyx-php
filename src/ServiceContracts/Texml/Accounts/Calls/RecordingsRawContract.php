<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

interface RecordingsRawContract
{
    /**
     * @api
     *
     * @param string $recordingSid path param: Uniquely identifies the recording by id
     * @param array<string,mixed>|RecordingRecordingSidJsonParams $params
     *
     * @return BaseResponse<RecordingRecordingSidJsonResponse>
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        array|RecordingRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
