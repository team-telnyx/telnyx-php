<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function retrieve(
        string $id,
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
     */
    public function list(
        $filter = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeListResponse {
        [$parsed, $options] = RequirementTypeListParams::parseRequest(
            ['filter' => $filter, 'sort' => $sort],
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
