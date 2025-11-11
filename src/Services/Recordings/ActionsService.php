<?php

declare(strict_types=1);

namespace Telnyx\Services\Recordings;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\Actions\ActionDeleteParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Recordings\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Permanently deletes a list of call recordings.
     *
     * @param array{ids: list<string>}|ActionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|ActionDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ActionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'recordings/actions/delete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
