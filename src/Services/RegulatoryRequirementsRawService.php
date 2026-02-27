<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsRawContract;

/**
 * Regulatory Requirements.
 *
 * @phpstan-import-type FilterShape from \Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RegulatoryRequirementsRawService implements RegulatoryRequirementsRawContract
{
    // @phpstan-ignore-next-line
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
     *   filter?: Filter|FilterShape
     * }|RegulatoryRequirementRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RegulatoryRequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|RegulatoryRequirementRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RegulatoryRequirementRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'regulatory_requirements',
            query: $parsed,
            options: $options,
            convert: RegulatoryRequirementGetResponse::class,
        );
    }
}
