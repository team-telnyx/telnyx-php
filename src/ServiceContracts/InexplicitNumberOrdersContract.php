<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;

interface InexplicitNumberOrdersContract
{
    /**
     * @api
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
    ): InexplicitNumberOrderNewResponse;

    /**
     * @api
     *
     * @param string $id Identifies the inexplicit number order
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): InexplicitNumberOrderGetResponse;

    /**
     * @api
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
    ): DefaultFlatPaginationForInexplicitNumberOrders;
}
