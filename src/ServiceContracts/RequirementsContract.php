<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\DocReqsRequirement;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Sort;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Requirements\RequirementListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequirementsContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param int $version Filter by requirement version number. When omitted, returns the currently-active version.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?int $version = null,
        RequestOptions|array|null $requestOptions = null,
    ): RequirementGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirements (deepObject style). Originally: sort[]
     * @param int $version Filter by requirement version number. When omitted, returns the currently-active version.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DocReqsRequirement>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
        ?int $version = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
