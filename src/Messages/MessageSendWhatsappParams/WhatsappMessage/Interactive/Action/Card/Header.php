<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Image;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Video;

/**
 * @phpstan-import-type ImageShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Image
 * @phpstan-import-type VideoShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Video
 *
 * @phpstan-type HeaderShape = array{
 *   image?: null|Image|ImageShape,
 *   type?: null|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type|value-of<\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type>,
 *   video?: null|Video|VideoShape,
 * }
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    #[Optional]
    public ?Image $image;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class,
    )]
    public ?string $type;

    #[Optional]
    public ?Video $video;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ImageShape $image
     * @param Type|value-of<Type> $type
     * @param VideoShape $video
     */
    public static function with(
        Image|array|null $image = null,
        Type|string|null $type = null,
        Video|array|null $video = null,
    ): self {
        $self = new self;

        null !== $image && $self['image'] = $image;
        null !== $type && $self['type'] = $type;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    /**
     * @param ImageShape $image
     */
    public function withImage(Image|array $image): self
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
     * @param VideoShape $video
     */
    public function withVideo(Video|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}
