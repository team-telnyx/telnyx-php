<?php

declare(strict_types=1);

namespace Telnyx\Services\BrowserSessions;

use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\Kind;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember0;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember1;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember2;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Key;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Wait;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\WaitUntil;
use Telnyx\BrowserSessions\Actions\ActionGetResponse;
use Telnyx\BrowserSessions\Actions\ActionNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrowserSessions\ActionsContract;

/**
 * Execute browser actions: navigate, observe, click, fill, select, press, scroll, wait_for, screenshot, batch.
 *
 * @phpstan-import-type ConditionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition
 * @phpstan-import-type ActionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Action
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Executes a browser action on the session. Returns 200 if completed within wait_seconds, 202 if still in-flight.
     *
     * Action types: navigate, observe, click, fill, select, press, scroll, wait_for, screenshot, batch.
     *
     * @param string $id Path param
     * @param string $url Body param
     * @param string $observationID Body param
     * @param string $ref Body param
     * @param string $value Body param
     * @param Key|value-of<Key> $key Body param
     * @param ConditionShape $condition Body param
     * @param list<ActionShape> $actions Body param
     * @param 'batch' $type Body param
     * @param int $waitSeconds Query param: Maximum seconds the submission request waits for completion, not an execution timeout. If still queued or running, returns 202 without cancelling execution; poll the returned action ID.
     * @param string $idempotencyKey Body param
     * @param bool $includeObservation Body param
     * @param WaitUntil|value-of<WaitUntil> $waitUntil Body param
     * @param int $timeoutMs Body param
     * @param Wait|value-of<Wait> $wait Body param
     * @param int $deltaX Body param
     * @param int $deltaY Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $url,
        string $observationID,
        string $ref,
        string $value,
        Key|string $key,
        UnionMember0|array|UnionMember1|UnionMember2|Kind $condition,
        array $actions,
        string $type = 'batch',
        int $waitSeconds = 10,
        ?string $idempotencyKey = null,
        bool $includeObservation = false,
        WaitUntil|string $waitUntil = 'load',
        int $timeoutMs = 5000,
        Wait|string $wait = 'dom_stable',
        int $deltaX = 0,
        int $deltaY = 0,
        RequestOptions|array|null $requestOptions = null,
    ): ActionNewResponse {
        $params = array_filter(
            [
                'type' => $type,
                'url' => $url,
                'waitSeconds' => $waitSeconds,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
                'includeObservation' => $includeObservation,
                'waitUntil' => $waitUntil,
                'observationID' => $observationID,
                'ref' => $ref,
                'timeoutMs' => $timeoutMs,
                'wait' => $wait,
                'value' => $value,
                'key' => $key,
                'deltaX' => $deltaX,
                'deltaY' => $deltaY,
                'condition' => $condition,
                'actions' => $actions,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the stored status and result of an action. Use this to poll actions that returned 202; HTTP 200 can contain any action status. Stored observations contain metadata with empty tree and refs, not the full snapshot; submit a fresh observe action to obtain current refs.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $actionID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): ActionGetResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($actionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
