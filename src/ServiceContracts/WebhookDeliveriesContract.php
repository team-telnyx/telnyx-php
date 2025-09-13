<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

use const Telnyx\Core\OMIT as omit;

interface WebhookDeliveriesContract
{
    /**
     * @api
     *
     * @return WebhookDeliveryGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryGetResponse;

    /**
     * @api
     *
     * @return WebhookDeliveryGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return WebhookDeliveryListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhookDeliveryListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryListResponse;
}
