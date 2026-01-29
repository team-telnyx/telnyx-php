<?php

declare(strict_types=1);

namespace Telnyx\Services\Recordings;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\Actions\ActionDeleteParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Recordings\ActionsRawContract;

/**
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
     * Permanently deletes a list of call recordings.
     *
     * @param array{ids: list<string>}|ActionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|ActionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'recordings/actions/delete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
