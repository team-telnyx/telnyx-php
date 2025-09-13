<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;
use Telnyx\ServiceContracts\RequirementTypesContract;

use const Telnyx\Core\OMIT as omit;

final class RequirementTypesService implements RequirementTypesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a requirement type by id
     *
     * @return RequirementTypeGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return RequirementTypeGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirement types (deepObject style). Originally: sort[]
     *
     * @return RequirementTypeListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeListResponse {
        $params = ['filter' => $filter, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RequirementTypeListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeListResponse {
        [$parsed, $options] = RequirementTypeListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'requirement_types',
            query: $parsed,
            options: $options,
            convert: RequirementTypeListResponse::class,
        );
    }
}
