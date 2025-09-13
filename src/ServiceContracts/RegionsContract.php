<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;

interface RegionsContract
{
    /**
     * @api
     *
     * @return RegionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RegionListResponse;

    /**
     * @api
     *
     * @return RegionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RegionListResponse;
}
