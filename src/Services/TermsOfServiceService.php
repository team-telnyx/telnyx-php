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
use Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType;
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
     * Returns whether the authenticated user has agreed to the current Number Reputation Terms of Service. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
     *
     * The `agreement_required: true` value means the user has not yet agreed (or has agreed to an outdated version) and must call `POST /terms_of_service/number_reputation/agree` before they can use the Number Reputation endpoints on an enterprise.
     *
     * @param ProductType|value-of<ProductType> $productType Which product's ToS to check. Defaults to `branded_calling`; pass `number_reputation` to check the Number Reputation Terms of Service.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function status(
        ProductType|string|null $productType = null,
        RequestOptions|array|null $requestOptions = null,
    ): TermsOfServiceStatusResponse {
        $params = Util::removeNulls(['productType' => $productType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->status(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
