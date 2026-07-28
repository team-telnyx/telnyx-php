<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailDomains;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\Webhooks\EmailWebhook;
use Telnyx\EmailDomains\Webhooks\EmailWebhookResponse;
use Telnyx\EmailDomains\Webhooks\WebhookCreateParams;
use Telnyx\EmailDomains\Webhooks\WebhookDeleteParams;
use Telnyx\EmailDomains\Webhooks\WebhookListParams;
use Telnyx\EmailDomains\Webhooks\WebhookRetrieveParams;
use Telnyx\EmailDomains\Webhooks\WebhookUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param array<string,mixed>|WebhookCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email webhook UUID
     * @param array<string,mixed>|WebhookRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Path param: Email webhook UUID
     * @param array<string,mixed>|WebhookUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param array<string,mixed>|WebhookListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email webhook UUID
     * @param array<string,mixed>|WebhookDeleteParams $params
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
    ): BaseResponse;
}
