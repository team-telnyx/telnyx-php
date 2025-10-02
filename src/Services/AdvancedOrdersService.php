<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
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
        $params = [
            'areaCode' => $areaCode,
            'comments' => $comments,
            'countryCode' => $countryCode,
            'customerReference' => $customerReference,
            'features' => $features,
            'phoneNumberType' => $phoneNumberType,
            'quantity' => $quantity,
            'requirementGroupID' => $requirementGroupID,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AdvancedOrderCreateParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->retrieveRaw($orderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $orderID,
        mixed $params,
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
     * List Advanced Orders
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): mixed
    {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'advanced_orders',
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
     * @param list<Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature|value-of<Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature>> $features
     * @param Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType|value-of<Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
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
        $params = [
            'areaCode' => $areaCode,
            'comments' => $comments,
            'countryCode' => $countryCode,
            'customerReference' => $customerReference,
            'features' => $features,
            'phoneNumberType' => $phoneNumberType,
            'quantity' => $quantity,
            'requirementGroupID' => $requirementGroupID,
        ];

        return $this->updateRequirementGroupRaw(
            $advancedOrderID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRequirementGroupRaw(
        string $advancedOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [
            $parsed, $options,
        ] = AdvancedOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['advanced_orders/%1$s/requirement_group', $advancedOrderID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
