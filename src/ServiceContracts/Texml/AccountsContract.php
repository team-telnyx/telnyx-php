<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;

interface AccountsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AccountRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        array|AccountRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccountGetRecordingsJsonResponse;

    /**
     * @api
     *
     * @param array<mixed>|AccountRetrieveTranscriptionsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        array|AccountRetrieveTranscriptionsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse;
}
