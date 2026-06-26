<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tags;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TagAddResponseShape = array{tags: list<string>}
 */
final class TagAddResponse implements BaseModel
{
    /** @use SdkModel<TagAddResponseShape> */
    use SdkModel;

    /** @var list<string> $tags */
    #[Required(list: 'string')]
    public array $tags;

    /**
     * `new TagAddResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagAddResponse::with(tags: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagAddResponse)->withTags(...)
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
     * @param list<string> $tags
     */
    public static function with(array $tags): self
    {
        $self = new self;

        $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
