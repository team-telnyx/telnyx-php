<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings\EmbeddingNewResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UsageShape = array{promptTokens: int, totalTokens: int}
 */
final class Usage implements BaseModel
{
    /** @use SdkModel<UsageShape> */
    use SdkModel;

    /**
     * Number of tokens in the input.
     */
    #[Required('prompt_tokens')]
    public int $promptTokens;

    /**
     * Total number of tokens used.
     */
    #[Required('total_tokens')]
    public int $totalTokens;

    /**
     * `new Usage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Usage::with(promptTokens: ..., totalTokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Usage)->withPromptTokens(...)->withTotalTokens(...)
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
     */
    public static function with(int $promptTokens, int $totalTokens): self
    {
        $self = new self;

        $self['promptTokens'] = $promptTokens;
        $self['totalTokens'] = $totalTokens;

        return $self;
    }

    /**
     * Number of tokens in the input.
     */
    public function withPromptTokens(int $promptTokens): self
    {
        $self = clone $this;
        $self['promptTokens'] = $promptTokens;

        return $self;
    }

    /**
     * Total number of tokens used.
     */
    public function withTotalTokens(int $totalTokens): self
    {
        $self = clone $this;
        $self['totalTokens'] = $totalTokens;

        return $self;
    }
}
