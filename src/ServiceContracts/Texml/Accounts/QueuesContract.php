<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Queues\QueueGetResponse;
use Telnyx\Texml\Accounts\Queues\QueueNewResponse;
use Telnyx\Texml\Accounts\Queues\QueueUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesContract
{
    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $friendlyName a human readable name for the queue
     * @param int $maxSize the maximum size of the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $accountSid,
        ?string $friendlyName = null,
        ?int $maxSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): QueueNewResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): QueueGetResponse;

    /**
     * @api
     *
     * @param string $queueSid path param: The QueueSid that identifies the call queue
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param int $maxSize body param: The maximum size of the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $queueSid,
        string $accountSid,
        ?int $maxSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): QueueUpdateResponse;

    /**
     * @api
     *
     * @param string $queueSid the QueueSid that identifies the call queue
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $queueSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
