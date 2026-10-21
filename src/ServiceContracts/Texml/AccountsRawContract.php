<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\TexmlGetCallRecordingsResponseBody;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccountsRawContract
{
    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array<string,mixed>|AccountRetrieveRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingsResponseBody>
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
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
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
