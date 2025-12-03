<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListResponse;
use Telnyx\ServiceContracts\RequirementsContract;

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
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     action?: 'branded_calling'|'ordering'|'porting',
     *     country_code?: string,
     *     phone_number_type?: 'local'|'national'|'toll_free',
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: list<'created_at'|'updated_at'|'country_code'|'phone_number_type'|'-created_at'|'-updated_at'|'-country_code'|'-phone_number_type'>,
     * }|RequirementListParams $params
     *
     * @return DefaultPagination<RequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = RequirementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'requirements',
            query: $parsed,
            options: $options,
            convert: RequirementListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
