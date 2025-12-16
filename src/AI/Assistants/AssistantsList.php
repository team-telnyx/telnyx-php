<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InferenceEmbeddingShape from \Telnyx\AI\Assistants\InferenceEmbedding
 *
 * @phpstan-type AssistantsListShape = array{data: list<InferenceEmbeddingShape>}
 */
final class AssistantsList implements BaseModel
{
    /** @use SdkModel<AssistantsListShape> */
    use SdkModel;

    /** @var list<InferenceEmbedding> $data */
    #[Required(list: InferenceEmbedding::class)]
    public array $data;

    /**
     * `new AssistantsList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantsList::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantsList)->withData(...)
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
     * @param list<InferenceEmbeddingShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<InferenceEmbeddingShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
