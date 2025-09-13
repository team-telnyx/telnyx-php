<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;

interface RegionsContract
{
    /**
     * @api
     *
     * @return RegionListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RegionListResponse;
}
