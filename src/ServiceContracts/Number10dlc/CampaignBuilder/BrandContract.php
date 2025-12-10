<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\CampaignBuilder;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\CampaignBuilder\Brand\BrandGetResponse;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $usecase,
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetResponse;
}
