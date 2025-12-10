<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrderPreviewContract;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

final class SimCardOrderPreviewService implements SimCardOrderPreviewContract
{
    /**
     * @api
     */
    public SimCardOrderPreviewRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimCardOrderPreviewRawService($client);
    }

    /**
     * @api
     *
     * Preview SIM card order purchases.
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards that the user would like to purchase in the SIM card order
     *
     * @throws APIException
     */
    public function preview(
        string $addressID,
        int $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderPreviewPreviewResponse {
        $params = Util::removeNulls(
            ['addressID' => $addressID, 'quantity' => $quantity]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->preview(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
