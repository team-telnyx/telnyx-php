<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams;
use Telnyx\Actions\Purchase\PurchaseCreateParams\Status;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\PurchaseRawContract;

/**
 * SIM Cards operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PurchaseRawService implements PurchaseRawContract
{
    // @phpstan-ignore-next-line
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
     *   simCardGroupID?: string,
     *   status?: Status|value-of<Status>,
     *   tags?: list<string>,
     *   whitelabelName?: string,
     * }|PurchaseCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PurchaseNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PurchaseCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PurchaseCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'actions/purchase/esims',
            body: (object) $parsed,
            options: $options,
            convert: PurchaseNewResponse::class,
        );
    }
}
