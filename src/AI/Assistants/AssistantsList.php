<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AssistantsListShape = array{data: list<InferenceEmbedding>}
 */
final class AssistantsList implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssistantsListShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<InferenceEmbedding> $data */
    #[Api(list: InferenceEmbedding::class)]
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
     * @param list<InferenceEmbedding> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<InferenceEmbedding> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
