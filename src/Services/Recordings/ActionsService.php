<?php

declare(strict_types=1);

namespace Telnyx\Services\Recordings;

use Telnyx\Client;
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
     * @param list<string> $ids list of call recording IDs to delete
     */
    public function delete($ids, ?RequestOptions $requestOptions = null): mixed
    {
        [$parsed, $options] = ActionDeleteParams::parseRequest(
            ['ids' => $ids],
            $requestOptions
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
