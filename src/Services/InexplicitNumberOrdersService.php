<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InexplicitNumberOrdersContract;

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
     * @param list<array{
     *   countRequested: string,
     *   countryISO: 'US'|'CA'|CountryISO,
     *   phoneNumberType: string,
     *   administrativeArea?: string,
     *   excludeHeldNumbers?: bool,
     *   features?: list<string>,
     *   locality?: string,
     *   nationalDestinationCode?: string,
     *   phoneNumber?: array{
     *     contains?: string, endsWith?: string, startsWith?: string
     *   },
     *   quickship?: bool,
     *   strategy?: 'always'|'never'|Strategy,
     * }> $orderingGroups Group(s) of numbers to order. You can have multiple ordering_groups objects added to a single request.
     * @param string $billingGroupID Billing group id to apply to phone numbers that are purchased
     * @param string $connectionID Connection id to apply to phone numbers that are purchased
     * @param string $customerReference Reference label for the customer
     * @param string $messagingProfileID Messaging profile id to apply to phone numbers that are purchased
     *
     * @throws APIException
     */
    public function create(
        array $orderingGroups,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderNewResponse {
        $params = [
            'orderingGroups' => $orderingGroups,
            'billingGroupID' => $billingGroupID,
            'connectionID' => $connectionID,
            'customerReference' => $customerReference,
            'messagingProfileID' => $messagingProfileID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @return DefaultFlatPaginationForInexplicitNumberOrders<InexplicitNumberOrderResponse,>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPaginationForInexplicitNumberOrders {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
