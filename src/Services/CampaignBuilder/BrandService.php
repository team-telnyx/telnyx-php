<?php

declare(strict_types=1);

namespace Telnyx\Services\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CampaignBuilder\BrandContract;

final class BrandService implements BrandContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
     *
     * @param string $brandID
     *
     * @return BrandQualifyByUsecaseResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse {
        $params = ['brandID' => $brandID];

        return $this->qualifyByUsecaseRaw($usecase, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BrandQualifyByUsecaseResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecaseRaw(
        string $usecase,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse {
        [$parsed, $options] = BrandQualifyByUsecaseParams::parseRequest(
            $params,
            $requestOptions
        );
        $brandID = $parsed['brandID'];
        unset($parsed['brandID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaignBuilder/brand/%1$s/usecase/%2$s', $brandID, $usecase],
            options: $options,
            convert: BrandQualifyByUsecaseResponse::class,
        );
    }
}
