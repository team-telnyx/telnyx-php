<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecordingsContract
{
    /**
     * @api
     *
     * @param string $recordingSid path param: Uniquely identifies the recording by id
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param Status|value-of<Status> $status Body param:
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        string $accountSid,
        string $callSid,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingRecordingSidJsonResponse;
}
