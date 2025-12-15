<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card\Header\Type;
use Telnyx\Messsages\WhatsappMedia;

/**
 * @phpstan-type HeaderShape = array{
 *   image?: WhatsappMedia|null,
 *   type?: value-of<\Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card\Header\Type>|null,
 *   video?: WhatsappMedia|null,
 * }
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappMedia $image;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class,
    )]
    public ?string $type;

    #[Optional]
    public ?WhatsappMedia $video;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     * @param Type|value-of<Type> $type
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
     */
    public static function with(
        WhatsappMedia|array|null $image = null,
        Type|string|null $type = null,
        WhatsappMedia|array|null $video = null,
    ): self {
        $self = new self;

        null !== $image && $self['image'] = $image;
        null !== $type && $self['type'] = $type;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    /**
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     */
    public function withImage(WhatsappMedia|array $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
     */
    public function withVideo(WhatsappMedia|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}
