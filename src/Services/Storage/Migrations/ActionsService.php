<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Migrations;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Migrations\ActionsContract;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Stop a Migration
     *
     * @return ActionStopResponse<HasRawResponse>
     */
    public function stop(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['storage/migrations/%1$s/actions/stop', $id],
            options: $requestOptions,
            convert: ActionStopResponse::class,
        );
    }
}
