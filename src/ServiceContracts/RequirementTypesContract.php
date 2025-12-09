<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;

interface RequirementTypesContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse;

    /**
     * @api
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
    ): RequirementTypeListResponse;
}
