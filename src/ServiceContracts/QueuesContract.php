<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\Queue;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\Queues\QueueNewResponse;
use Telnyx\Queues\QueueUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesContract
{
    /**
     * @api
     *
     * @param string $queueName The name of the queue. Must be between 1 and 255 characters.
     * @param int $maxSize the maximum number of calls allowed in the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $queueName,
        int $maxSize = 300,
        RequestOptions|array|null $requestOptions = null,
    ): QueueNewResponse;

    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): QueueGetResponse;

    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param int $maxSize the maximum number of calls allowed in the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $queueName,
        int $maxSize,
        RequestOptions|array|null $requestOptions = null,
    ): QueueUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Queue>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
