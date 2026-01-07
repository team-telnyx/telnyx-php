<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RequirementTypes\RequirementTypeListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequirementTypesContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RequirementTypeGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirement types (deepObject style). Originally: sort[]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): RequirementTypeListResponse;
}
