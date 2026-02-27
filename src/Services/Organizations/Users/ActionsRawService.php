<?php

declare(strict_types=1);

namespace Telnyx\Services\Organizations\Users;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Organizations\Users\Actions\ActionRemoveResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Organizations\Users\ActionsRawContract;

/**
 * Operations related to users in your organization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Deletes a user in your organization.
     *
     * @param string $id Organization User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['organizations/users/%1$s/actions/remove', $id],
            options: $requestOptions,
            convert: ActionRemoveResponse::class,
        );
    }
}
