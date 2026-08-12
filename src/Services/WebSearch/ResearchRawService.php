<?php

declare(strict_types=1);

namespace Telnyx\Services\WebSearch;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebSearch\ResearchRawContract;
use Telnyx\WebSearch\Research\ResearchCreateParams;
use Telnyx\WebSearch\Research\ResearchCreateParams\ResearchEffort;
use Telnyx\WebSearch\Research\ResearchGetResponse;
use Telnyx\WebSearch\Research\ResearchNewResponse;

/**
 * Deep research with citations and async task polling.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ResearchRawService implements ResearchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Starts a deep research task that runs multiple searches, reads sources, and synthesizes an answer with citations.
     *
     * ## Synchronous mode (default)
     *
     * When `background` is `false` or omitted, the request blocks until the research completes and returns the answer with citations. This can take up to 120 seconds depending on `research_effort`.
     *
     * ## Asynchronous mode
     *
     * When `background` is `true`, the request returns immediately with a `task_id` and `status: pending`. Poll `GET /web_search/research/{task_id}` to check when the research completes and retrieve the answer.
     *
     * @param array{
     *   query: string,
     *   background?: bool,
     *   maxSources?: int,
     *   researchEffort?: ResearchEffort|value-of<ResearchEffort>,
     * }|ResearchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResearchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ResearchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ResearchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'web_search/research',
            body: (object) $parsed,
            options: $options,
            convert: ResearchNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Polls the status of a previously started asynchronous research task. When the status is `completed`, the response includes the answer and citations. When the status is `failed`, the response includes an error message.
     *
     * @param string $taskID the research task ID returned by `POST /web_search/research` with `background: true`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResearchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['web_search/research/%1$s', $taskID],
            options: $requestOptions,
            convert: ResearchGetResponse::class,
        );
    }
}
