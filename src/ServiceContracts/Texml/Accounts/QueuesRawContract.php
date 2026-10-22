<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForQueues;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Queues\QueueCreateParams;
use Telnyx\Texml\Accounts\Queues\QueueDeleteParams;
use Telnyx\Texml\Accounts\Queues\QueueListParams;
use Telnyx\Texml\Accounts\Queues\QueueResource;
use Telnyx\Texml\Accounts\Queues\QueueRetrieveParams;
use Telnyx\Texml\Accounts\Queues\QueueUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesRawContract
{
    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array<string,mixed>|QueueCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueResource>
     *
     * @throws APIException
     */
    public function create(
        string $accountSid,
        array|QueueCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueResource>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueSid,
        array|QueueRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid path param: The QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueResource>
     *
     * @throws APIException
     */
    public function update(
        string $queueSid,
        array|QueueUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array<string,mixed>|QueueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPaginationForQueues<QueueResource>>
     *
     * @throws APIException
     */
    public function list(
        string $accountSid,
        array|QueueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $queueSid,
        array|QueueDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
