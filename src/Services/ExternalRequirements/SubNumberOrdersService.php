<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalRequirements;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalRequirements\SubNumberOrdersContract;

/**
 * Requirement Groups.
 *
 * @phpstan-import-type RequirementShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SubNumberOrdersService implements SubNumberOrdersContract
{
    /**
     * @api
     */
    public SubNumberOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubNumberOrdersRawService($client);
    }

    /**
     * @api
     *
     * Returns the input fields an action requirement needs and the current requirement action for a sub number order. Action requirements are fulfilled by an external step rather than by uploading documents. Australia mobile ID verification is currently the only action requirement. Once a verification link has been generated, it is returned in `requirement_action.value`.
     *
     * @param string $subNumberOrderID the ID of the sub number order the requirement belongs to
     * @param string $regulatoryRequirementID The ID of the regulatory (action) requirement. For Australia mobile ID verification this is `b7c72fb8-fa08-4529-aaf6-b9117d3f3698`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        string $regulatoryRequirementID,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderGetResponse {
        $params = Util::removeNulls(
            ['regulatoryRequirementID' => $regulatoryRequirementID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($subNumberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submits the end user's details to the external verification provider and returns the requirement action. Australia mobile ID verification is currently the only action requirement. It generates a unique Onfido verification link, returned in `requirement_action.value`, which you share with the end user. The end user's `first_name` and `last_name` must be nested inside a `requirement` object; sending them at the top level is rejected.
     *
     * @param string $subNumberOrderID path param: The ID of the sub number order the requirement belongs to
     * @param string $regulatoryRequirementID Path param: The ID of the regulatory (action) requirement. For Australia mobile ID verification this is `b7c72fb8-fa08-4529-aaf6-b9117d3f3698`.
     * @param Requirement|RequirementShape $requirement Body param: The end user's identity details for the action requirement. Australia mobile ID verification is currently the only action requirement. It requires `first_name` and `last_name`, the same fields the corresponding GET lists in `fields_required`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        string $regulatoryRequirementID,
        Requirement|array $requirement,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        $params = Util::removeNulls(
            [
                'regulatoryRequirementID' => $regulatoryRequirementID,
                'requirement' => $requirement,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($subNumberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
