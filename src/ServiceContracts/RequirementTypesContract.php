<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;
use Telnyx\RequirementTypes\RequirementTypeListResponse;

use const Telnyx\Core\OMIT as omit;

interface RequirementTypesContract
{
    /**
     * @api
     *
     * @return RequirementTypeGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirement types (deepObject style). Originally: sort[]
     *
     * @return RequirementTypeListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeListResponse;
}
