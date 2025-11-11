<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

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

interface CallsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallCallsParams $params
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        array|CallCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallCallsResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallRetrieveCallsParams $params
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        array|CallRetrieveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetCallsResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallSiprecJsonParams $params
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        array|CallSiprecJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallSiprecJsonResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallStreamsJsonParams $params
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        array|CallStreamsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallStreamsJsonResponse;
}
