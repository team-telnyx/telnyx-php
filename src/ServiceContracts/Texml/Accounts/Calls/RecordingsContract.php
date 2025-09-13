<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

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
     */
    public function recordingSidJson(
        string $recordingSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse;
}
