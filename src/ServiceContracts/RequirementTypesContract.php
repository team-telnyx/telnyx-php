<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     * @return RequirementTypeGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse;

    /**
     * @api
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
    ): RequirementTypeListResponse;

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
    ): RequirementTypeListResponse;
}
