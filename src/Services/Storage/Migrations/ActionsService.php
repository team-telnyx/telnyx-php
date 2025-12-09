<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Migrations;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Migrations\ActionsContract;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Stop a Migration
     *
     * @param string $id unique identifier for the data migration
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stop($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
