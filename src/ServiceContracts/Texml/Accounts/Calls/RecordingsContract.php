<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

interface RecordingsContract
{
    /**
     * @api
     *
     * @param string $accountSid
     * @param string $callSid
     * @param Status|value-of<Status> $status
     *
     * @return RecordingRecordingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RecordingRecordingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse;
}
