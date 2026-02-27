<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrderPreviewRawContract;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewParams;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

/**
 * SIM Card Orders operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SimCardOrderPreviewRawService implements SimCardOrderPreviewRawContract
{
    // @phpstan-ignore-next-line
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
     *   addressID: string, quantity: int
     * }|SimCardOrderPreviewPreviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderPreviewPreviewResponse>
     *
     * @throws APIException
     */
    public function preview(
        array|SimCardOrderPreviewPreviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
