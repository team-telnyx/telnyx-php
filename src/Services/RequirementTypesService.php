<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListResponse;
use Telnyx\ServiceContracts\RequirementTypesContract;

final class RequirementTypesService implements RequirementTypesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a requirement type by id
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['requirement_types/%1$s', $id],
            options: $requestOptions,
            convert: RequirementTypeGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all requirement types ordered by created_at descending
     *
     * @param array{
     *   filter?: array{name?: array{contains?: string}},
     *   sort?: list<'name'|'created_at'|'updated_at'|'-name'|'-created_at'|'-updated_at'>,
     * }|RequirementTypeListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RequirementTypeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementTypeListResponse {
        [$parsed, $options] = RequirementTypeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'requirement_types',
            query: $parsed,
            options: $options,
            convert: RequirementTypeListResponse::class,
        );
    }
}
