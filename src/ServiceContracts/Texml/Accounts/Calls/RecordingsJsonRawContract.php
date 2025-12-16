<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRetrieveRecordingsJsonParams;

interface RecordingsJsonRawContract
{
    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array<string,mixed>|RecordingsJsonRecordingsJsonParams $params
     *
     * @return BaseResponse<RecordingsJsonRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        array|RecordingsJsonRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array<string,mixed>|RecordingsJsonRetrieveRecordingsJsonParams $params
     *
     * @return BaseResponse<RecordingsJsonGetRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        array|RecordingsJsonRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
