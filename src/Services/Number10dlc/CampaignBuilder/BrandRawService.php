<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\CampaignBuilder;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\CampaignBuilder\Brand\BrandGetResponse;
use Telnyx\Number10dlc\CampaignBuilder\Brand\BrandRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\CampaignBuilder\BrandRawContract;

final class BrandRawService implements BrandRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
     *
     * @param array{brandID: string}|BrandRetrieveParams $params
     *
     * @return BaseResponse<BrandGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $usecase,
        array|BrandRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $brandID = $parsed['brandID'];
        unset($parsed['brandID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                '10dlc/campaignBuilder/brand/%1$s/usecase/%2$s', $brandID, $usecase,
            ],
            options: $options,
            convert: BrandGetResponse::class,
        );
    }
}
