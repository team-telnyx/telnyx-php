<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

interface SimCardOrderPreviewContract
{
    /**
     * @api
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards that the user would like to purchase in the SIM card order
     *
     * @return SimCardOrderPreviewPreviewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function preview(
        $addressID,
        $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderPreviewPreviewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardOrderPreviewPreviewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function previewRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderPreviewPreviewResponse;
}
