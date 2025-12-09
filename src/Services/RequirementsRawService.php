<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListParams\Filter\Action;
use Telnyx\Requirements\RequirementListParams\Filter\PhoneNumberType;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;
use Telnyx\ServiceContracts\RequirementsRawContract;

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
     *
     * @return BaseResponse<RequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{
     *     action?: 'branded_calling'|'ordering'|'porting'|Action,
     *     countryCode?: string,
     *     phoneNumberType?: 'local'|'national'|'toll_free'|PhoneNumberType,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: list<'created_at'|'updated_at'|'country_code'|'phone_number_type'|'-created_at'|'-updated_at'|'-country_code'|'-phone_number_type'|Sort>,
     * }|RequirementListParams $params
     *
     * @return BaseResponse<RequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = RequirementListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'requirements',
            query: $parsed,
            options: $options,
            convert: RequirementListResponse::class,
        );
    }
}
