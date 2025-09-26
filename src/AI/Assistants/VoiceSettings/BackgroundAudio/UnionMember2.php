<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember2\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type union_member2 = array{type: value-of<Type>, value: string}
 */
final class UnionMember2 implements BaseModel
{
    /** @use SdkModel<union_member2> */
    use SdkModel;

    /**
     * Reference a previously uploaded media by its name from Telnyx Media Storage.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The `name` of a media asset created via [Media Storage API](https://developers.telnyx.com/api/media-storage/create-media-storage). The audio will loop during the call.
     */
    #[Api]
    public string $value;

    /**
     * `new UnionMember2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember2::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember2)->withType(...)->withValue(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string $type, string $value): self
    {
        $obj = new self;

        $obj->type = $type instanceof Type ? $type->value : $type;
        $obj->value = $value;

        return $obj;
    }

    /**
     * Reference a previously uploaded media by its name from Telnyx Media Storage.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * The `name` of a media asset created via [Media Storage API](https://developers.telnyx.com/api/media-storage/create-media-storage). The audio will loop during the call.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
