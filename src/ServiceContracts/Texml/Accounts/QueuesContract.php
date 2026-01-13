<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Queues\QueueGetResponse;
use Telnyx\Texml\Accounts\Queues\QueueListResponse;
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
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $dateCreated Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param string $dateUpdated Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param RequestOpts|null $requestOptions
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
    ): QueueListResponse;

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
