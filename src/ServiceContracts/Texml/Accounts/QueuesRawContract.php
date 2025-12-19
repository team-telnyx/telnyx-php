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

interface QueuesRawContract
{
    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array<string,mixed>|QueueCreateParams $params
     *
     * @return BaseResponse<QueueNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $accountSid,
        array|QueueCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueRetrieveParams $params
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueSid,
        array|QueueRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid path param: The QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueUpdateParams $params
     *
     * @return BaseResponse<QueueUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $queueSid,
        array|QueueUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param array<string,mixed>|QueueDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $queueSid,
        array|QueueDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
