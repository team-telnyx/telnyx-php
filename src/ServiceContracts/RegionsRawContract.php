<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;

interface RegionsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<RegionListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;
}
