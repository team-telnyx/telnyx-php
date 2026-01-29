<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\CallCallsParams;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams;
use Telnyx\Texml\Accounts\Calls\CallRetrieveParams;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsRawContract
{
    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array<string,mixed>|CallRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        array|CallRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array<string,mixed>|CallUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|CallCallsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallCallsResponse>
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        array|CallCallsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|CallRetrieveCallsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallGetCallsResponse>
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        array|CallRetrieveCallsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array<string,mixed>|CallSiprecJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallSiprecJsonResponse>
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        array|CallSiprecJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array<string,mixed>|CallStreamsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallStreamsJsonResponse>
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        array|CallStreamsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
