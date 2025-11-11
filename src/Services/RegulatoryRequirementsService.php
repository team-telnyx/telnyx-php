<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsContract;

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
     * @param array{
     *   filter?: array{
     *     action?: "ordering"|"porting"|"action",
     *     country_code?: string,
     *     phone_number?: string,
     *     phone_number_type?: "local"|"toll_free"|"mobile"|"national"|"shared_cost",
     *     requirement_group_id?: string,
     *   },
     * }|RegulatoryRequirementRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|RegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): RegulatoryRequirementGetResponse {
        [$parsed, $options] = RegulatoryRequirementRetrieveParams::parseRequest(
            $params,
            $requestOptions,
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
