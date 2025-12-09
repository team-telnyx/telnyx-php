<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;
use Telnyx\ServiceContracts\RequirementTypesRawContract;

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
     *
     * @return BaseResponse<RequirementTypeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{name?: array{contains?: string}},
     *   sort?: list<'name'|'created_at'|'updated_at'|'-name'|'-created_at'|'-updated_at'|Sort>,
     * }|RequirementTypeListParams $params
     *
     * @return BaseResponse<RequirementTypeListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementTypeListParams $params,
        ?RequestOptions $requestOptions = null,
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
