<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsContract;

use const Telnyx\Core\OMIT as omit;

final class RegulatoryRequirementsService implements RegulatoryRequirementsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve regulatory requirements
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): RegulatoryRequirementGetResponse {
        [$parsed, $options] = RegulatoryRequirementRetrieveParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'regulatory_requirements',
            query: $parsed,
            options: $options,
            convert: RegulatoryRequirementGetResponse::class,
        );
    }
}
