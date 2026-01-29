<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type;
use Telnyx\Messages\WhatsappMedia;

/**
 * @phpstan-import-type WhatsappMediaShape from \Telnyx\Messages\WhatsappMedia
 *
 * @phpstan-type HeaderShape = array{
 *   image?: null|WhatsappMedia|WhatsappMediaShape,
 *   type?: null|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type|value-of<\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type>,
 *   video?: null|WhatsappMedia|WhatsappMediaShape,
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
     * @param WhatsappMedia|WhatsappMediaShape|null $image
     * @param Type|value-of<Type>|null $type
     * @param WhatsappMedia|WhatsappMediaShape|null $video
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
     * @param WhatsappMedia|WhatsappMediaShape $image
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
     * @param WhatsappMedia|WhatsappMediaShape $video
     */
    public function withVideo(WhatsappMedia|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}
