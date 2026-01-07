<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type OrderingGroupShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InexplicitNumberOrdersContract
{
    /**
     * @api
     *
     * @param list<OrderingGroup|OrderingGroupShape> $orderingGroups Group(s) of numbers to order. You can have multiple ordering_groups objects added to a single request.
     * @param string $billingGroupID Billing group id to apply to phone numbers that are purchased
     * @param string $connectionID Connection id to apply to phone numbers that are purchased
     * @param string $customerReference Reference label for the customer
     * @param string $messagingProfileID Messaging profile id to apply to phone numbers that are purchased
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $orderingGroups,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): InexplicitNumberOrderNewResponse;

    /**
     * @api
     *
     * @param string $id Identifies the inexplicit number order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): InexplicitNumberOrderGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPaginationForInexplicitNumberOrders<InexplicitNumberOrderResponse,>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPaginationForInexplicitNumberOrders;
}
