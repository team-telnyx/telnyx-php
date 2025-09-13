<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Page;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;

use const Telnyx\Core\OMIT as omit;

interface RequirementsContract
{
    /**
     * @api
     *
     * @return RequirementGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGetResponse;

    /**
     * @api
     *
     * @return RequirementGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirements (deepObject style). Originally: sort[]
     *
     * @return RequirementListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RequirementListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementListResponse;
}
