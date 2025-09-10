<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrderPreviewContract;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewParams;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

final class SimCardOrderPreviewService implements SimCardOrderPreviewContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Preview SIM card order purchases.
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards that the user would like to purchase in the SIM card order
     */
    public function preview(
        $addressID,
        $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderPreviewPreviewResponse {
        [$parsed, $options] = SimCardOrderPreviewPreviewParams::parseRequest(
            ['addressID' => $addressID, 'quantity' => $quantity],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sim_card_order_preview',
            body: (object) $parsed,
            options: $options,
            convert: SimCardOrderPreviewPreviewResponse::class,
        );
    }
}
