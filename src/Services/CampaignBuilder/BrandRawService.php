<?php

declare(strict_types=1);

namespace Telnyx\Services\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CampaignBuilder\BrandRawContract;

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
     * @param array{brandID: string}|BrandQualifyByUsecaseParams $params
     *
     * @return BaseResponse<BrandQualifyByUsecaseResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        array|BrandQualifyByUsecaseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandQualifyByUsecaseParams::parseRequest(
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
            convert: BrandQualifyByUsecaseResponse::class,
        );
    }
}
