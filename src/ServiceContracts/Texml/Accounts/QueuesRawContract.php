<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Queues\QueueCreateParams;
use Telnyx\Texml\Accounts\Queues\QueueDeleteParams;
use Telnyx\Texml\Accounts\Queues\QueueGetResponse;
use Telnyx\Texml\Accounts\Queues\QueueNewResponse;
use Telnyx\Texml\Accounts\Queues\QueueRetrieveParams;
use Telnyx\Texml\Accounts\Queues\QueueUpdateParams;
use Telnyx\Texml\Accounts\Queues\QueueUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesRawContract
{
    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|QueueCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueNewResponse>
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
     * @return BaseResponse<QueueGetResponse>
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
     * @return BaseResponse<QueueUpdateResponse>
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
