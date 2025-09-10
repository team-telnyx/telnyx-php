<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

interface SimCardOrderPreviewContract
{
    /**
     * @api
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards that the user would like to purchase in the SIM card order
     */
    public function preview(
        $addressID,
        $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderPreviewPreviewResponse;
}
