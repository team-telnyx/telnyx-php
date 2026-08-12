<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailDomains;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\Webhooks\EmailWebhook;
use Telnyx\EmailDomains\Webhooks\EmailWebhookEvent;
use Telnyx\EmailDomains\Webhooks\EmailWebhookResponse;
use Telnyx\EmailDomains\Webhooks\WebhookCreateParams;
use Telnyx\EmailDomains\Webhooks\WebhookDeleteParams;
use Telnyx\EmailDomains\Webhooks\WebhookListParams;
use Telnyx\EmailDomains\Webhooks\WebhookListParams\Sort;
use Telnyx\EmailDomains\Webhooks\WebhookRetrieveParams;
use Telnyx\EmailDomains\Webhooks\WebhookUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailDomains\WebhooksRawContract;

/**
 * Per-domain webhook endpoints with event subscriptions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WebhooksRawService implements WebhooksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a webhook endpoint subscribed to a specific allowlist of event types. Both `email.*` events (published by email-api) and `email_domain.*` events (published by this service) flow through the same webhooks.
     *
     * @param string $domainID Email domain UUID
     * @param array{
     *   events: list<EmailWebhookEvent|value-of<EmailWebhookEvent>>, url: string
     * }|WebhookCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailWebhookResponse>
     *
     * @throws APIException
     */
    public function create(
        string $domainID,
        array|WebhookCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_domains/%1$s/webhooks', $domainID],
            body: (object) $parsed,
            options: $options,
            convert: EmailWebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the webhook subscription identified by ID within the specified email domain.
     *
     * @param string $id Email webhook UUID
     * @param array{domainID: string}|WebhookRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailWebhookResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|WebhookRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $domainID = $parsed['domainID'];
        unset($parsed['domainID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_domains/%1$s/webhooks/%2$s', $domainID, $id],
            options: $options,
            convert: EmailWebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a webhook's URL and/or event subscription. A webhook is bound to its domain — `domain_id` is not mutable.
     *
     * @param string $id Path param: Email webhook UUID
     * @param array{
     *   domainID: string,
     *   events?: list<EmailWebhookEvent|value-of<EmailWebhookEvent>>,
     *   url?: string,
     * }|WebhookUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailWebhookResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $domainID = $parsed['domainID'];
        unset($parsed['domainID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_domains/%1$s/webhooks/%2$s', $domainID, $id],
            body: (object) array_diff_key($parsed, array_flip(['domainID'])),
            options: $options,
            convert: EmailWebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of webhook subscriptions scoped to the email domain. Results can be sorted by creation time.
     *
     * @param string $domainID Email domain UUID
     * @param array{
     *   pageNumber?: int, pageSize?: int, sort?: Sort|value-of<Sort>
     * }|WebhookListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailWebhook>>
     *
     * @throws APIException
     */
    public function list(
        string $domainID,
        array|WebhookListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_domains/%1$s/webhooks', $domainID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: EmailWebhook::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the webhook subscription identified by ID within the specified email domain and returns the deleted subscription.
     *
     * @param string $id Email webhook UUID
     * @param array{domainID: string}|WebhookDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailWebhookResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|WebhookDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $domainID = $parsed['domainID'];
        unset($parsed['domainID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_domains/%1$s/webhooks/%2$s', $domainID, $id],
            options: $options,
            convert: EmailWebhookResponse::class,
        );
    }
}
