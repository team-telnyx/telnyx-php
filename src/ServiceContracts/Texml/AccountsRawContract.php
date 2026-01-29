<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccountsRawContract
{
    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|AccountRetrieveRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccountGetRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        array|AccountRetrieveRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|AccountRetrieveTranscriptionsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccountGetTranscriptionsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        array|AccountRetrieveTranscriptionsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
