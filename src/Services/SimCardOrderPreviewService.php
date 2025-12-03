<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{
     *   address_id: string, quantity: int
     * }|SimCardOrderPreviewPreviewParams $params
     *
     * @throws APIException
     */
    public function preview(
        array|SimCardOrderPreviewPreviewParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderPreviewPreviewResponse {
        [$parsed, $options] = SimCardOrderPreviewPreviewParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'sim_card_order_preview',
            body: (object) $parsed,
            options: $options,
            convert: SimCardOrderPreviewPreviewResponse::class,
        );
    }
}
