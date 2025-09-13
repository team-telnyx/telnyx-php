<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Page;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;
use Telnyx\ServiceContracts\RequirementsContract;

use const Telnyx\Core\OMIT as omit;

final class RequirementsService implements RequirementsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a document requirement record
     *
     * @return RequirementGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['requirements/%1$s', $id],
            options: $requestOptions,
            convert: RequirementGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all requirements with filtering, sorting, and pagination
     *
     * @param Filter $filter Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for requirements (deepObject style). Originally: sort[]
     *
     * @return RequirementListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementListResponse {
        [$parsed, $options] = RequirementListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'requirements',
            query: $parsed,
            options: $options,
            convert: RequirementListResponse::class,
        );
    }
}
