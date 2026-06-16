<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfServiceContract;
use Telnyx\Services\TermsOfService\AgreementsService;
use Telnyx\Services\TermsOfService\BrandedCallingService;
use Telnyx\Services\TermsOfService\NumberReputationService;
use Telnyx\TermsOfService\TermsOfServiceInfoParams\ProductType;
use Telnyx\TermsOfService\TermsOfServiceInfoResponse;
use Telnyx\TermsOfService\TermsOfServiceStatusResponse;

/**
 * Accept and review the Branded Calling and Phone Number Reputation terms of service.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TermsOfServiceService implements TermsOfServiceContract
{
    /**
     * @api
     */
    public TermsOfServiceRawService $raw;

    /**
     * @api
     */
    public NumberReputationService $numberReputation;

    /**
     * @api
     */
    public AgreementsService $agreements;

    /**
     * @api
     */
    public BrandedCallingService $brandedCalling;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TermsOfServiceRawService($client);
        $this->numberReputation = new NumberReputationService($client);
        $this->agreements = new AgreementsService($client);
        $this->brandedCalling = new BrandedCallingService($client);
    }

    /**
     * @api
     *
     * Returns the available Terms of Service agreements (product, current version, terms URL, effective date). Omit `product_type` to return all products; pass it to scope to one.
     *
     * @param ProductType|value-of<ProductType> $productType Optional product filter. Omit to return info for all products.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function info(
        ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceInfoResponse {
        $params = Util::removeNulls(['productType' => $productType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->info(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns whether the authenticated user has agreed to the current Terms of Service for the product given by `product_type`. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
     *
     * `agreement_required: true` means the user has not yet agreed (or has agreed to an outdated version) and must agree before using that product's endpoints.
     *
     * @param \Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType|value-of<\Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType> $productType Which product's ToS to check. Defaults to `branded_calling`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function status(
        \Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceStatusResponse {
        $params = Util::removeNulls(['productType' => $productType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->status(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
