<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams;
use Telnyx\Actions\Purchase\PurchaseCreateParams\Status;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\PurchaseContract;

use const Telnyx\Core\OMIT as omit;

final class PurchaseService implements PurchaseContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Purchases and registers the specified amount of eSIMs to the current user's account.<br/><br/>
     * If <code>sim_card_group_id</code> is provided, the eSIMs will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>
     *
     * @param int $amount the amount of eSIMs to be purchased
     * @param string $product Type of product to be purchased, specify "whitelabel" to use a custom SPN
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param Status|value-of<Status> $status status on which the SIM cards will be set after being successfully registered
     * @param list<string> $tags Searchable tags associated with the SIM cards
     * @param string $whitelabelName Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     *
     * @return PurchaseNewResponse<HasRawResponse>
     */
    public function create(
        $amount,
        $product = omit,
        $simCardGroupID = omit,
        $status = omit,
        $tags = omit,
        $whitelabelName = omit,
        ?RequestOptions $requestOptions = null,
    ): PurchaseNewResponse {
        [$parsed, $options] = PurchaseCreateParams::parseRequest(
            [
                'amount' => $amount,
                'product' => $product,
                'simCardGroupID' => $simCardGroupID,
                'status' => $status,
                'tags' => $tags,
                'whitelabelName' => $whitelabelName,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'actions/purchase/esims',
            body: (object) $parsed,
            options: $options,
            convert: PurchaseNewResponse::class,
        );
    }
}
