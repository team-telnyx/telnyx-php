<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;
use Telnyx\ServiceContracts\RequirementTypesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RequirementTypes\RequirementTypeListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequirementTypesRawService implements RequirementTypesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a requirement type by id
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementTypeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['requirement_types/%1$s', $id],
            options: $requestOptions,
            convert: RequirementTypeGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all requirement types ordered by created_at descending
     *
     * @param array{
     *   filter?: Filter|FilterShape, sort?: list<Sort|value-of<Sort>>
     * }|RequirementTypeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementTypeListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementTypeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequirementTypeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'requirement_types',
            query: $parsed,
            options: $options,
            convert: RequirementTypeListResponse::class,
        );
    }
}
