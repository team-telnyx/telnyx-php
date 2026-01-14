<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPaginationForQueues;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\QueuesContract;
use Telnyx\Texml\Accounts\Queues\QueueGetResponse;
use Telnyx\Texml\Accounts\Queues\QueueListResponse;
use Telnyx\Texml\Accounts\Queues\QueueNewResponse;
use Telnyx\Texml\Accounts\Queues\QueueUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class QueuesService implements QueuesContract
{
    /**
     * @api
     */
    public QueuesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new QueuesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new queue resource.
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
    ): QueueNewResponse {
        $params = Util::removeNulls(
            ['friendlyName' => $friendlyName, 'maxSize' => $maxSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($accountSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a queue resource.
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
    ): QueueGetResponse {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($queueSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a queue resource.
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
    ): QueueUpdateResponse {
        $params = Util::removeNulls(
            ['accountSid' => $accountSid, 'maxSize' => $maxSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($queueSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists queue resources.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPaginationForQueues<QueueListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $accountSid,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPaginationForQueues {
        $params = Util::removeNulls(
            [
                'dateCreated' => $dateCreated,
                'dateUpdated' => $dateUpdated,
                'page' => $page,
                'pageSize' => $pageSize,
                'pageToken' => $pageToken,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($accountSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a queue resource.
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
    ): mixed {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($queueSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
