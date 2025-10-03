<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionRequirementsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionRequirementsService implements ActionRequirementsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of action requirements for a specific porting order.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($portingOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $portingOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementListResponse {
        [$parsed, $options] = ActionRequirementListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/action_requirements', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: ActionRequirementListResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiates a specific action requirement for a porting order.
     *
     * @param string $portingOrderID
     * @param Params $params required information for initiating the action requirement for AU ID verification
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        $portingOrderID,
        $params,
        ?RequestOptions $requestOptions = null
    ): ActionRequirementInitiateResponse {
        $params1 = ['portingOrderID' => $portingOrderID, 'params' => $params];

        return $this->initiateRaw($id, $params1, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function initiateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionRequirementInitiateResponse {
        [$parsed, $options] = ActionRequirementInitiateParams::parseRequest(
            $params,
            $requestOptions
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'porting_orders/%1$s/action_requirements/%2$s/initiate',
                $portingOrderID,
                $id,
            ],
            body: (object) array_diff_key($parsed, ['portingOrderID']),
            options: $options,
            convert: ActionRequirementInitiateResponse::class,
        );
    }
}
