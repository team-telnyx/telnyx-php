<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Aligns with the OpenAI API:
 * https://platform.openai.com/docs/api-reference/assistants/deleteAssistant
 *
 * @phpstan-type AssistantDeleteResponseShape = array{
 *   id: string, deleted: bool, object: string
 * }
 */
final class AssistantDeleteResponse implements BaseModel
{
    /** @use SdkModel<AssistantDeleteResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $deleted;

    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['deleted'] = $deleted;
        $self['object'] = $object;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }

    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }
}
