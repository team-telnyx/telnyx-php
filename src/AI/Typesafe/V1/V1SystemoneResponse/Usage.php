<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Token usage for the completed evaluation.
 *
 * @phpstan-type UsageShape = array{inputTokens: int, outputTokens: int}
 */
final class Usage implements BaseModel
{
    /** @use SdkModel<UsageShape> */
    use SdkModel;

    /**
     * Input tokens processed, including shared-context preparation and question evaluation. This can exceed the token count of the unique input text.
     */
    #[Required('input_tokens')]
    public int $inputTokens;

    /**
     * Output tokens used for the evaluation, including shared-context preparation.
     */
    #[Required('output_tokens')]
    public int $outputTokens;

    /**
     * `new Usage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Usage::with(inputTokens: ..., outputTokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Usage)->withInputTokens(...)->withOutputTokens(...)
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
    public static function with(int $inputTokens, int $outputTokens): self
    {
        $self = new self;

        $self['inputTokens'] = $inputTokens;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }

    /**
     * Input tokens processed, including shared-context preparation and question evaluation. This can exceed the token count of the unique input text.
     */
    public function withInputTokens(int $inputTokens): self
    {
        $self = clone $this;
        $self['inputTokens'] = $inputTokens;

        return $self;
    }

    /**
     * Output tokens used for the evaluation, including shared-context preparation.
     */
    public function withOutputTokens(int $outputTokens): self
    {
        $self = clone $this;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }
}
