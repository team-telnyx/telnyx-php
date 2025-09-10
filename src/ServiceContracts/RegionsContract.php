<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Regions\RegionListResponse;
use Telnyx\RequestOptions;

interface RegionsContract
{
    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RegionListResponse;
}
