<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams\Filter\Action;
use Telnyx\Requirements\RequirementListParams\Filter\PhoneNumberType;
use Telnyx\Requirements\RequirementListParams\Sort;
use Telnyx\Requirements\RequirementListResponse;

interface RequirementsContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
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
     * @param array{
     *   action?: 'branded_calling'|'ordering'|'porting'|Action,
     *   countryCode?: string,
     *   phoneNumberType?: 'local'|'national'|'toll_free'|PhoneNumberType,
     * } $filter Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<'created_at'|'updated_at'|'country_code'|'phone_number_type'|'-created_at'|'-updated_at'|'-country_code'|'-phone_number_type'|Sort> $sort Consolidated sort parameter for requirements (deepObject style). Originally: sort[]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): RequirementListResponse;
}
