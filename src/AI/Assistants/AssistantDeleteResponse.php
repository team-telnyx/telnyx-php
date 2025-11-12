<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * Aligns with the OpenAI API:
 * https://platform.openai.com/docs/api-reference/assistants/deleteAssistant
 *
 * @phpstan-type AssistantDeleteResponseShape = array{
 *   id: string, deleted: bool, object: string
 * }
 */
final class AssistantDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssistantDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public bool $deleted;

    #[Api]
    public string $object;

    /**
     * `new AssistantDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantDeleteResponse::with(id: ..., deleted: ..., object: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantDeleteResponse)->withID(...)->withDeleted(...)->withObject(...)
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
    public static function with(string $id, bool $deleted, string $object): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->deleted = $deleted;
        $obj->object = $object;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

        return $obj;
    }

    public function withObject(string $object): self
    {
        $obj = clone $this;
        $obj->object = $object;

        return $obj;
    }
}
