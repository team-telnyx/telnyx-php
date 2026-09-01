<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalRequirements;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequirementShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SubNumberOrdersContract
{
    /**
     * @api
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
    ): SubNumberOrderGetResponse;

    /**
     * @api
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
    ): SubNumberOrderUpdateResponse;
}
