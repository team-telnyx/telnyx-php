<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailDomains;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\Webhooks\EmailWebhook;
use Telnyx\EmailDomains\Webhooks\EmailWebhookEvent;
use Telnyx\EmailDomains\Webhooks\EmailWebhookResponse;
use Telnyx\EmailDomains\Webhooks\WebhookListParams\Sort;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailDomains\WebhooksContract;

/**
 * Per-domain webhook endpoints with event subscriptions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Creates a webhook endpoint subscribed to a specific allowlist of event types. Both `email.*` events (published by email-api) and `email_domain.*` events (published by this service) flow through the same webhooks.
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
    ): EmailWebhookResponse {
        $params = Util::removeNulls(['events' => $events, 'url' => $url]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($domainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a webhook
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
    ): EmailWebhookResponse {
        $params = Util::removeNulls(['domainID' => $domainID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a webhook's URL and/or event subscription. A webhook is bound to its domain — `domain_id` is not mutable.
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
    ): EmailWebhookResponse {
        $params = Util::removeNulls(
            ['domainID' => $domainID, 'events' => $events, 'url' => $url]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List webhooks for an email domain
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($domainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a webhook
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
    ): EmailWebhookResponse {
        $params = Util::removeNulls(['domainID' => $domainID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
