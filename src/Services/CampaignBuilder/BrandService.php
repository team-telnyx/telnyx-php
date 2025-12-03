<?php

declare(strict_types=1);

namespace Telnyx\Services\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{brandId: string}|BrandQualifyByUsecaseParams $params
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        array|BrandQualifyByUsecaseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BrandQualifyByUsecaseResponse {
        [$parsed, $options] = BrandQualifyByUsecaseParams::parseRequest(
            $params,
            $requestOptions,
        );
        $brandID = $parsed['brandId'];
        unset($parsed['brandId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['campaignBuilder/brand/%1$s/usecase/%2$s', $brandID, $usecase],
            options: $options,
            convert: BrandQualifyByUsecaseResponse::class,
        );
    }
}
