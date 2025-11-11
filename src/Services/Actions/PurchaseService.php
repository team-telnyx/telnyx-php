<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\PurchaseContract;

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
     * @param array{
     *   amount: int,
     *   product?: string,
     *   sim_card_group_id?: string,
     *   status?: "enabled"|"disabled"|"standby",
     *   tags?: list<string>,
     *   whitelabel_name?: string,
     * }|PurchaseCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PurchaseCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): PurchaseNewResponse {
        [$parsed, $options] = PurchaseCreateParams::parseRequest(
            $params,
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
