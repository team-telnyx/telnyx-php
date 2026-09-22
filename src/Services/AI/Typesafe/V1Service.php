<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Typesafe;

use Telnyx\AI\Typesafe\V1\V1SystemoneResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Typesafe\V1Contract;

/**
 * Beta API for evaluating shared context with typed questions and structured answers. Telnyx manages model selection.
 *
 * @phpstan-import-type QuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question
 * @phpstan-import-type StateShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\State
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1Service implements V1Contract
{
    /**
     * @api
     */
    public V1RawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V1RawService($client);
    }

    /**
     * @api
     *
     * **Beta API.** Telnyx controls model selection.
     *
     * Evaluate shared context using named choice, noul (yes/no), and score questions. Returns TypeSafe System One-compatible answer shapes, an opaque compatibility identifier, and token usage. See the [decision model guide](https://developers.telnyx.com/docs/inference/decision-models) for examples and compatibility limits.
     *
     * The supported request subset requires instructions for every question, string descriptions for criteria (or null for choice descriptions), 1–64 questions, and 2–64 options for choice and score questions. The SDK-supplied model value is ignored and cannot select a model. Other unknown fields are rejected. The endpoint is synchronous and does not stream.
     *
     * Use the TypeSafe Python SDK with base_url set to https://api.telnyx.com/v2/ai/typesafe and a Telnyx API key. The SDK appends /v1/systemone. Compatibility covers this operation and the documented request subset; it does not include TypeSafe model listing. Scores describe relative preference, not calibrated correctness.
     *
     * @param array<string,QuestionShape> $questions Between 1 and 64 named questions. Each key identifies the corresponding answer.
     * @param StateShape $state shared context evaluated by every question
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function systemone(
        array $questions,
        string|array $state,
        RequestOptions|array|null $requestOptions = null,
    ): V1SystemoneResponse {
        $params = ['questions' => $questions, 'state' => $state];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->systemone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
