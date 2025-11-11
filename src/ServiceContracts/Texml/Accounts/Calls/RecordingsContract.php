<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

interface RecordingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RecordingRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        array|RecordingRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse;
}
