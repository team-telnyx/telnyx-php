<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\ActionType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\Status;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort\Value;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionRequirementsRawContract;

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
     *   filter?: array{
     *     id?: list<string>,
     *     actionType?: 'au_id_verification'|ActionType,
     *     requirementTypeID?: string,
     *     status?: 'created'|'pending'|'completed'|'cancelled'|'failed'|Status,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{
     *     value?: 'created_at'|'-created_at'|'updated_at'|'-updated_at'|Value
     *   },
     * }|ActionRequirementListParams $params
     *
     * @return BaseResponse<ActionRequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|ActionRequirementListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRequirementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Path param: The ID of the action requirement
     * @param array{
     *   portingOrderID: string, params: array{firstName: string, lastName: string}
     * }|ActionRequirementInitiateParams $params
     *
     * @return BaseResponse<ActionRequirementInitiateResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        array|ActionRequirementInitiateParams $params,
        ?RequestOptions $requestOptions = null,
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
            body: (object) array_diff_key($parsed, ['portingOrderID']),
            options: $options,
            convert: ActionRequirementInitiateResponse::class,
        );
    }
}
