<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\Feature as Feature1;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\PhoneNumberType as PhoneNumberType1;
use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AdvancedOrdersContract;

use const Telnyx\Core\OMIT as omit;

final class AdvancedOrdersService implements AdvancedOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Advanced Order
     *
     * @param string $areaCode
     * @param string $comments
     * @param string $countryCode
     * @param string $customerReference
     * @param list<Feature|value-of<Feature>> $features
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     */
    public function create(
        $areaCode = omit,
        $comments = omit,
        $countryCode = omit,
        $customerReference = omit,
        $features = omit,
        $phoneNumberType = omit,
        $quantity = omit,
        $requirementGroupID = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdvancedOrderCreateParams::parseRequest(
            [
                'areaCode' => $areaCode,
                'comments' => $comments,
                'countryCode' => $countryCode,
                'customerReference' => $customerReference,
                'features' => $features,
                'phoneNumberType' => $phoneNumberType,
                'quantity' => $quantity,
                'requirementGroupID' => $requirementGroupID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'advanced_orders',
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Get Advanced Order
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['advanced_orders/%1$s', $orderID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Update Advanced Order
     *
     * @param string $areaCode
     * @param string $comments
     * @param string $countryCode
     * @param string $customerReference
     * @param list<Feature1|value-of<Feature1>> $features
     * @param PhoneNumberType1|value-of<PhoneNumberType1> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     */
    public function update(
        string $orderID,
        $areaCode = omit,
        $comments = omit,
        $countryCode = omit,
        $customerReference = omit,
        $features = omit,
        $phoneNumberType = omit,
        $quantity = omit,
        $requirementGroupID = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdvancedOrderUpdateParams::parseRequest(
            [
                'areaCode' => $areaCode,
                'comments' => $comments,
                'countryCode' => $countryCode,
                'customerReference' => $customerReference,
                'features' => $features,
                'phoneNumberType' => $phoneNumberType,
                'quantity' => $quantity,
                'requirementGroupID' => $requirementGroupID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['advanced_orders/%1$s', $orderID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * List Advanced Orders
     */
    public function list(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'advanced_orders',
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
