<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\EncodingFormat;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\Input;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an embedding vector representing the input text. This endpoint is compatible with the [OpenAI Embeddings API](https://platform.openai.com/docs/api-reference/embeddings) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
 *
 * @see Telnyx\Services\AI\OpenAI\EmbeddingsService::create()
 *
 * @phpstan-import-type InputVariants from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\Input
 * @phpstan-import-type InputShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\Input
 *
 * @phpstan-type EmbeddingCreateParamsShape = array{
 *   input: InputShape,
 *   model: string,
 *   dimensions?: int|null,
 *   encodingFormat?: null|EncodingFormat|value-of<EncodingFormat>,
 *   user?: string|null,
 * }
 */
final class EmbeddingCreateParams implements BaseModel
{
    /** @use SdkModel<EmbeddingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Input text to embed. Can be a string or array of strings.
     *
     * @var InputVariants $input
     */
    #[Required(union: Input::class)]
    public string|array $input;

    /**
     * ID of the model to use. Use the List embedding models endpoint to see available models.
     */
    #[Required]
    public string $model;

    /**
     * The number of dimensions the resulting output embeddings should have. Only supported in some models.
     */
    #[Optional]
    public ?int $dimensions;

    /**
     * The format to return the embeddings in.
     *
     * @var value-of<EncodingFormat>|null $encodingFormat
     */
    #[Optional('encoding_format', enum: EncodingFormat::class)]
    public ?string $encodingFormat;

    /**
     * A unique identifier representing your end-user for monitoring and abuse detection.
     */
    #[Optional]
    public ?string $user;

    /**
     * `new EmbeddingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingCreateParams::with(input: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingCreateParams)->withInput(...)->withModel(...)
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
     * @param InputShape $input
     * @param EncodingFormat|value-of<EncodingFormat>|null $encodingFormat
     */
    public static function with(
        string|array $input,
        string $model,
        ?int $dimensions = null,
        EncodingFormat|string|null $encodingFormat = null,
        ?string $user = null,
    ): self {
        $self = new self;

        $self['input'] = $input;
        $self['model'] = $model;

        null !== $dimensions && $self['dimensions'] = $dimensions;
        null !== $encodingFormat && $self['encodingFormat'] = $encodingFormat;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    /**
     * Input text to embed. Can be a string or array of strings.
     *
     * @param InputShape $input
     */
    public function withInput(string|array $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

        return $self;
    }

    /**
     * ID of the model to use. Use the List embedding models endpoint to see available models.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The number of dimensions the resulting output embeddings should have. Only supported in some models.
     */
    public function withDimensions(int $dimensions): self
    {
        $self = clone $this;
        $self['dimensions'] = $dimensions;

        return $self;
    }

    /**
     * The format to return the embeddings in.
     *
     * @param EncodingFormat|value-of<EncodingFormat> $encodingFormat
     */
    public function withEncodingFormat(
        EncodingFormat|string $encodingFormat
    ): self {
        $self = clone $this;
        $self['encodingFormat'] = $encodingFormat;

        return $self;
    }

    /**
     * A unique identifier representing your end-user for monitoring and abuse detection.
     */
    public function withUser(string $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
