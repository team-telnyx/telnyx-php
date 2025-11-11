<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRetrieveRecordingsJsonParams;

interface RecordingsJsonContract
{
    /**
     * @api
     *
     * @param array<mixed>|RecordingsJsonRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        array|RecordingsJsonRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonRecordingsJsonResponse;

    /**
     * @api
     *
     * @param array<mixed>|RecordingsJsonRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        array|RecordingsJsonRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonGetRecordingsJsonResponse;
}
