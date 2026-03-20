<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tags;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add Assistant Tag.
 *
 * @see Telnyx\Services\AI\Assistants\TagsService::add()
 *
 * @phpstan-type TagAddParamsShape = array{tag: string}
 */
final class TagAddParams implements BaseModel
{
    /** @use SdkModel<TagAddParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tag;

    /**
     * `new TagAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagAddParams::with(tag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagAddParams)->withTag(...)
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
    public static function with(string $tag): self
    {
        $self = new self;

        $self['tag'] = $tag;

        return $self;
    }

    public function withTag(string $tag): self
    {
        $self = clone $this;
        $self['tag'] = $tag;

        return $self;
    }
}
