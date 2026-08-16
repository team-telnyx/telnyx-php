<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\WebSearch;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WebSearch\Research\ResearchCreateParams\ResearchEffort;
use Telnyx\WebSearch\Research\ResearchGetResponse;
use Telnyx\WebSearch\Research\ResearchNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ResearchContract
{
    /**
     * @api
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
    ): ResearchNewResponse;

    /**
     * @api
     *
     * @param string $taskID the research task ID returned by `POST /web_search/research` with `background: true`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ResearchGetResponse;
}
