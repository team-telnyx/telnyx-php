<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\CampaignBuilder;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilder\BrandContract;

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
        $params = Util::removeNulls(['brandID' => $brandID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->qualifyByUsecase($usecase, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
