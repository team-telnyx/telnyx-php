<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalRequirements;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalRequirements\SubNumberOrdersRawContract;

/**
 * Requirement Groups.
 *
 * @phpstan-import-type RequirementShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SubNumberOrdersRawService implements SubNumberOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the input fields an action requirement needs and the current requirement action for a sub number order. Action requirements are fulfilled by an external step rather than by uploading documents. Australia mobile ID verification is currently the only action requirement. Once a verification link has been generated, it is returned in `requirement_action.value`.
     *
     * @param string $subNumberOrderID the ID of the sub number order the requirement belongs to
     * @param array{
     *   regulatoryRequirementID: string
     * }|SubNumberOrderRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regulatoryRequirementID = $parsed['regulatoryRequirementID'];
        unset($parsed['regulatoryRequirementID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'external_requirements/%1$s/sub_number_orders/%2$s',
                $regulatoryRequirementID,
                $subNumberOrderID,
            ],
            options: $options,
            convert: SubNumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Submits the end user's details to the external verification provider and returns the requirement action. Australia mobile ID verification is currently the only action requirement. It generates a unique Onfido verification link, returned in `requirement_action.value`, which you share with the end user. The end user's `first_name` and `last_name` must be nested inside a `requirement` object; sending them at the top level is rejected.
     *
     * @param string $subNumberOrderID path param: The ID of the sub number order the requirement belongs to
     * @param array{
     *   regulatoryRequirementID: string, requirement: Requirement|RequirementShape
     * }|SubNumberOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regulatoryRequirementID = $parsed['regulatoryRequirementID'];
        unset($parsed['regulatoryRequirementID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'external_requirements/%1$s/sub_number_orders/%2$s',
                $regulatoryRequirementID,
                $subNumberOrderID,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['regulatoryRequirementID'])
            ),
            options: $options,
            convert: SubNumberOrderUpdateResponse::class,
        );
    }
}
