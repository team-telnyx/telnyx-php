<?php

declare(strict_types=1);

namespace Telnyx\Services\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CampaignBuilder\BrandContract;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandRawService($client);
    }

    /**
     * @api
     *
     * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse {
        $params = ['brandID' => $brandID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->qualifyByUsecase($usecase, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
