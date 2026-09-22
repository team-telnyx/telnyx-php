<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Typesafe;

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function systemone(
        array $questions,
        string|array $state,
        RequestOptions|array|null $requestOptions = null,
    ): V1SystemoneResponse;
}
