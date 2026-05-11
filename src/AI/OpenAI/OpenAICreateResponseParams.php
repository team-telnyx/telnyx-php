<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://developers.openai.com/api/reference/resources/responses) and may be used with the OpenAI JS or Python SDK. Response id parameter is not supported at the moment. Use 'conversation' parameter to leverage persistent conversations feature.
 *
 * @see Telnyx\Services\AI\OpenAIService::createResponse()
 *
 * @phpstan-type OpenAICreateResponseParamsShape = array{body: array<string,mixed>}
 */
final class OpenAICreateResponseParams implements BaseModel
{
    /** @use SdkModel<OpenAICreateResponseParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed> $body */
    #[Required(map: 'mixed')]
    public array $body;

    /**
     * `new OpenAICreateResponseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OpenAICreateResponseParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OpenAICreateResponseParams)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $body
     */
    public static function with(array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param array<string,mixed> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
