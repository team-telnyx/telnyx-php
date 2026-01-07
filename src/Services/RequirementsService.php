<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Page;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;
use Telnyx\ServiceContracts\RequirementsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Requirements\RequirementListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Requirements\RequirementListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequirementsService implements RequirementsContract
{
    /**
     * @api
     */
    public RequirementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RequirementsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a document requirement record
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RequirementGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all requirements with filtering, sorting, and pagination
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirements (deepObject style). Originally: sort[]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
