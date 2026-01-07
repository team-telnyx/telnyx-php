<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\CampaignBuilder;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilder\BrandRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandQualifyByUsecaseResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        array|BrandQualifyByUsecaseParams $params,
        RequestOptions|array|null $requestOptions = null,
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
