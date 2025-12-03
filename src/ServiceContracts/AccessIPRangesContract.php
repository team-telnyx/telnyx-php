<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeCreateParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface AccessIPRangesContract
{
    /**
     * @api
     *
     * @param array<mixed>|AccessIPRangeCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPRangeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRange;

    /**
     * @api
     *
     * @param array<mixed>|AccessIPRangeListParams $params
     *
     * @return DefaultFlatPagination<AccessIPRange>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPRangeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;
}
