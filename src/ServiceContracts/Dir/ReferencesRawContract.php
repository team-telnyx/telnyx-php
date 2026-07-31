<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\References\ReferenceCreateParams;
use Telnyx\Dir\References\ReferenceList;
use Telnyx\Dir\References\ReferenceUpdateParams;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReferencesRawContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|ReferenceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceList>
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        array|ReferenceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $slot Path param: Reference slot, counting from 1. Business references are slots 1 and 2, matching the order they were sent in the `business_references` array; the financial reference is slot 1. Every reference returned by the submit and list endpoints carries its own `ref_type` and `slot`, so you do not need to derive them.
     * @param array<string,mixed>|ReferenceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $slot,
        array|ReferenceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceList>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
