<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;
use Telnyx\ServiceContracts\RequirementsRawContract;

/**
 * Requirements for international numbers and porting orders.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Requirements\RequirementListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequirementsRawService implements RequirementsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a document requirement record
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: list<Sort|value-of<Sort>>,
     * }|RequirementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RequirementListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequirementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'requirements',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: RequirementListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
