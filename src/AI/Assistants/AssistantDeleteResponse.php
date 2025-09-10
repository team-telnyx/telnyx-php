<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Aligns with the OpenAI API:
 * https://platform.openai.com/docs/api-reference/assistants/deleteAssistant
 *
 * @phpstan-type assistant_delete_response = array{
 *   id: string, deleted: bool, object1: string
 * }
 */
final class AssistantDeleteResponse implements BaseModel
{
    /** @use SdkModel<assistant_delete_response> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $deleted;

    #[Api]
    public string $object1;

    /**
     * `new AssistantDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantDeleteResponse::with(id: ..., deleted: ..., object1: ...)
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
    public static function with(
        string $id,
        bool $deleted,
        string $object1
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->deleted = $deleted;
        $obj->object1 = $object1;

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

    public function withObject(string $object1): self
    {
        $obj = clone $this;
        $obj->object1 = $object1;

        return $obj;
    }
}
