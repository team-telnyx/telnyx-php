<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams\Status;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PurchaseContract
{
    /**
     * @api
     *
     * @param int $amount the amount of eSIMs to be purchased
     * @param string $product Type of product to be purchased, specify "whitelabel" to use a custom SPN
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param Status|value-of<Status> $status status on which the SIM cards will be set after being successfully registered
     * @param list<string> $tags Searchable tags associated with the SIM cards
     * @param string $whitelabelName Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $amount,
        ?string $product = null,
        ?string $simCardGroupID = null,
        Status|string $status = 'enabled',
        ?array $tags = null,
        ?string $whitelabelName = null,
        RequestOptions|array|null $requestOptions = null,
    ): PurchaseNewResponse;
}
