<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\SimCardGroupCreateParams;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListParams;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupRetrieveParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

interface SimCardGroupsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardGroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardGroupRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardGroupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardGroupListParams $params
     *
     * @return DefaultFlatPagination<SimCardGroupListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse;
}
