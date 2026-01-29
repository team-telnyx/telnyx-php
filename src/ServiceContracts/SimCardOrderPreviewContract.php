<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardOrderPreviewContract
{
    /**
     * @api
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards that the user would like to purchase in the SIM card order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function preview(
        string $addressID,
        int $quantity,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardOrderPreviewPreviewResponse;
}
