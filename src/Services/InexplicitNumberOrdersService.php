<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InexplicitNumberOrdersContract;

/**
 * Inexplicit number orders for bulk purchasing without specifying exact numbers.
 *
 * @phpstan-import-type OrderingGroupShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InexplicitNumberOrdersService implements InexplicitNumberOrdersContract
{
    /**
     * @api
     */
    public InexplicitNumberOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InexplicitNumberOrdersRawService($client);
    }

    /**
     * @api
     *
     * Create an inexplicit number order to programmatically purchase phone numbers without specifying exact numbers.
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
    ): InexplicitNumberOrderNewResponse {
        $params = Util::removeNulls(
            [
                'orderingGroups' => $orderingGroups,
                'billingGroupID' => $billingGroupID,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'messagingProfileID' => $messagingProfileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an existing inexplicit number order by ID.
     *
     * @param string $id Identifies the inexplicit number order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): InexplicitNumberOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of inexplicit number orders.
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
    ): DefaultFlatPaginationForInexplicitNumberOrders {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
