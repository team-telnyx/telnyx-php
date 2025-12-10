<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;
use Telnyx\ServiceContracts\RequirementTypesContract;

final class RequirementTypesService implements RequirementTypesContract
{
    /**
     * @api
     */
    public RequirementTypesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RequirementTypesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a requirement type by id
     *
     * @param string $id Uniquely identifies the requirement_type record
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all requirement types ordered by created_at descending
     *
     * @param array{
     *   name?: array{contains?: string}
     * } $filter Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name]
     * @param list<'name'|'created_at'|'updated_at'|'-name'|'-created_at'|'-updated_at'|Sort> $sort Consolidated sort parameter for requirement types (deepObject style). Originally: sort[]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): RequirementTypeListResponse {
        $params = Util::removeNulls(['filter' => $filter, 'sort' => $sort]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
