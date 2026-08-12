<?php

declare(strict_types=1);

namespace Telnyx\Services\WebSearch;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebSearch\ResearchContract;
use Telnyx\WebSearch\Research\ResearchCreateParams\ResearchEffort;
use Telnyx\WebSearch\Research\ResearchGetResponse;
use Telnyx\WebSearch\Research\ResearchNewResponse;

/**
 * Deep research with citations and async task polling.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ResearchService implements ResearchContract
{
    /**
     * @api
     */
    public ResearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ResearchRawService($client);
    }

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
     * @param string $query the research question or topic
     * @param bool $background When `true`, the research runs asynchronously. The response returns a `task_id` immediately instead of waiting for the result. Poll `GET /web_search/research/{task_id}` to check status.
     * @param int $maxSources maximum number of sources to use
     * @param ResearchEffort|value-of<ResearchEffort> $researchEffort Research depth level. `lite` is fastest, `deep` is most thorough.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $query,
        ?bool $background = null,
        ?int $maxSources = null,
        ResearchEffort|string|null $researchEffort = null,
        RequestOptions|array|null $requestOptions = null,
    ): ResearchNewResponse {
        $params = Util::removeNulls(
            [
                'query' => $query,
                'background' => $background,
                'maxSources' => $maxSources,
                'researchEffort' => $researchEffort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Polls the status of a previously started asynchronous research task. When the status is `completed`, the response includes the answer and citations. When the status is `failed`, the response includes an error message.
     *
     * @param string $taskID the research task ID returned by `POST /web_search/research` with `background: true`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ResearchGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
