<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Migrations;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Migrations\ActionsRawContract;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

/**
 * Migrate data from an external provider into Telnyx Cloud Storage.
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
     * Stop a Migration
     *
     * @param string $id unique identifier for the data migration
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopResponse>
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['storage/migrations/%1$s/actions/stop', $id],
            options: $requestOptions,
            convert: ActionStopResponse::class,
        );
    }
}
