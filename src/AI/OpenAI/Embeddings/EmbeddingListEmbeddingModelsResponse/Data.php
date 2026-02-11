<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string, created: int, object: string, ownedBy: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The model identifier.
     */
    #[Required]
    public string $id;

    /**
     * Unix timestamp of when the model was created.
     */
    #[Required]
    public int $created;

    /**
     * The object type, always 'model'.
     */
    #[Required]
    public string $object;

    /**
     * The organization that owns the model.
     */
    #[Required('owned_by')]
    public string $ownedBy;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., created: ..., object: ..., ownedBy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withCreated(...)->withObject(...)->withOwnedBy(...)
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
        int $created,
        string $ownedBy,
        string $object = 'model'
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['created'] = $created;
        $self['object'] = $object;
        $self['ownedBy'] = $ownedBy;

        return $self;
    }

    /**
     * The model identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Unix timestamp of when the model was created.
     */
    public function withCreated(int $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The object type, always 'model'.
     */
    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    /**
     * The organization that owns the model.
     */
    public function withOwnedBy(string $ownedBy): self
    {
        $self = clone $this;
        $self['ownedBy'] = $ownedBy;

        return $self;
    }
}
