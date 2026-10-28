<?php

declare(strict_types=1);

namespace Telnyx\Services\BrowserSessions;

use Telnyx\BrowserSessions\Actions\ActionCreateParams;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Key;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Wait;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\WaitUntil;
use Telnyx\BrowserSessions\Actions\ActionGetResponse;
use Telnyx\BrowserSessions\Actions\ActionNewResponse;
use Telnyx\BrowserSessions\Actions\ActionRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrowserSessions\ActionsRawContract;

/**
 * Execute browser actions: navigate, observe, click, fill, select, press, scroll, wait_for, screenshot, batch.
 *
 * @phpstan-import-type ConditionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition
 * @phpstan-import-type ActionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Action
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
     * Executes a browser action on the session. Returns 200 if completed within wait_seconds, 202 if still in-flight.
     *
     * Action types: navigate, observe, click, fill, select, press, scroll, wait_for, screenshot, batch.
     *
     * @param string $id Path param
     * @param array{
     *   type?: 'batch',
     *   url: string,
     *   waitSeconds?: int,
     *   idempotencyKey?: string,
     *   includeObservation?: bool,
     *   waitUntil?: WaitUntil|value-of<WaitUntil>,
     *   observationID: string,
     *   ref: string,
     *   timeoutMs?: int,
     *   wait?: Wait|value-of<Wait>,
     *   value: string,
     *   key: value-of<Key>,
     *   deltaX?: int,
     *   deltaY?: int,
     *   condition: ConditionShape,
     *   actions: list<ActionShape>,
     * }|ActionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|ActionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['waitSeconds']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['browser_sessions/%1$s/actions', $id],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['waitSeconds' => 'wait_seconds'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ActionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the stored status and result of an action. Use this to poll actions that returned 202; HTTP 200 can contain any action status. Stored observations contain metadata with empty tree and refs, not the full snapshot; submit a fresh observe action to obtain current refs.
     *
     * @param array{id: string}|ActionRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $actionID,
        array|ActionRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['browser_sessions/%1$s/actions/%2$s', $id, $actionID],
            options: $options,
            convert: ActionGetResponse::class,
        );
    }
}
