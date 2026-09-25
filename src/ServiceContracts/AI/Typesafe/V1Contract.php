<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Typesafe;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Model;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type QuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question
 * @phpstan-import-type StateShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\State
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface V1Contract
{
    /**
     * @api
     *
     * @param array<string,QuestionShape> $questions Between 1 and 64 named questions. Each key identifies the corresponding answer.
     * @param StateShape $state shared context evaluated by every question
     * @param Model|value-of<Model> $model Public model alias. telnyx/decision-flash offers the lowest cost and latency; telnyx/decision-pro supports decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Applies to every question in the request. Other values are rejected.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function systemone(
        array $questions,
        string|array $state,
        Model|string $model = 'telnyx/decision-flash',
        RequestOptions|array|null $requestOptions = null,
    ): V1SystemoneResponse;
}
