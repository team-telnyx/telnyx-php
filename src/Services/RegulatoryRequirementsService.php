<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RegulatoryRequirementsService implements RegulatoryRequirementsContract
{
    /**
     * @api
     */
    public RegulatoryRequirementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RegulatoryRequirementsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve regulatory requirements
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): RegulatoryRequirementGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
