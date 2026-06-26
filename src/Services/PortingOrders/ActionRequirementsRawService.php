<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionRequirementsRawContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort
 * @phpstan-import-type ParamsShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionRequirementsRawService implements ActionRequirementsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of action requirements for a specific porting order.
     *
     * @param string $portingOrderID The ID of the porting order
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|SortShape,
     * }|ActionRequirementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ActionRequirementListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|ActionRequirementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRequirementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/action_requirements', $portingOrderID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ActionRequirementListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Initiates a specific action requirement for a porting order.
     *
     * @param string $id Path param: The ID of the action requirement
     * @param array{
     *   portingOrderID: string, params: Params|ParamsShape
     * }|ActionRequirementInitiateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRequirementInitiateResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        array|ActionRequirementInitiateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRequirementInitiateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'porting_orders/%1$s/action_requirements/%2$s/initiate',
                $portingOrderID,
                $id,
            ],
            body: (object) array_diff_key($parsed, array_flip(['portingOrderID'])),
            options: $options,
            convert: ActionRequirementInitiateResponse::class,
        );
    }
}
