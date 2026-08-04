<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailDomains;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\Webhooks\EmailWebhook;
use Telnyx\EmailDomains\Webhooks\EmailWebhookEvent;
use Telnyx\EmailDomains\Webhooks\EmailWebhookResponse;
use Telnyx\EmailDomains\Webhooks\WebhookListParams\Sort;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>> $events at least one event type is required
     * @param string $url HTTPS endpoint to deliver subscribed events to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $domainID,
        array $events,
        string $url,
        RequestOptions|array|null $requestOptions = null,
    ): EmailWebhookResponse;

    /**
     * @api
     *
     * @param string $id Email webhook UUID
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        string $domainID,
        RequestOptions|array|null $requestOptions = null,
    ): EmailWebhookResponse;

    /**
     * @api
     *
     * @param string $id Path param: Email webhook UUID
     * @param string $domainID Path param: Email domain UUID
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>> $events Body param
     * @param string $url Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $domainID,
        ?array $events = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailWebhookResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param int $pageNumber Page number to return (offset pagination)
     * @param int $pageSize Number of records per page
     * @param Sort|value-of<Sort> $sort Field to sort by. Prefix with `-` for descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailWebhook>
     *
     * @throws APIException
     */
    public function list(
        string $domainID,
        int $pageNumber = 1,
        int $pageSize = 25,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Email webhook UUID
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $domainID,
        RequestOptions|array|null $requestOptions = null,
    ): EmailWebhookResponse;
}
