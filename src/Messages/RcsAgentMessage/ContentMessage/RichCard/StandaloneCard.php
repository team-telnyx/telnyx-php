<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\CardOrientation;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\ThumbnailImageAlignment;
use Telnyx\Messages\RcsCardContent;

/**
 * Standalone card.
 *
 * @phpstan-import-type RcsCardContentShape from \Telnyx\Messages\RcsCardContent
 *
 * @phpstan-type StandaloneCardShape = array{
 *   cardContent: RcsCardContent|RcsCardContentShape,
 *   cardOrientation: CardOrientation|value-of<CardOrientation>,
 *   thumbnailImageAlignment: ThumbnailImageAlignment|value-of<ThumbnailImageAlignment>,
 * }
 */
final class StandaloneCard implements BaseModel
{
    /** @use SdkModel<StandaloneCardShape> */
    use SdkModel;

    #[Required('card_content')]
    public RcsCardContent $cardContent;

    /**
     * Orientation of the card.
     *
     * @var value-of<CardOrientation> $cardOrientation
     */
    #[Required('card_orientation', enum: CardOrientation::class)]
    public string $cardOrientation;

    /**
     * Image preview alignment for standalone cards with horizontal layout.
     *
     * @var value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    #[Required('thumbnail_image_alignment', enum: ThumbnailImageAlignment::class)]
    public string $thumbnailImageAlignment;

    /**
     * `new StandaloneCard()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandaloneCard::with(
     *   cardContent: ..., cardOrientation: ..., thumbnailImageAlignment: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StandaloneCard)
     *   ->withCardContent(...)
     *   ->withCardOrientation(...)
     *   ->withThumbnailImageAlignment(...)
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
     * @param RcsCardContentShape $cardContent
     * @param CardOrientation|value-of<CardOrientation> $cardOrientation
     * @param ThumbnailImageAlignment|value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    public static function with(
        RcsCardContent|array $cardContent,
        CardOrientation|string $cardOrientation,
        ThumbnailImageAlignment|string $thumbnailImageAlignment,
    ): self {
        $self = new self;

        $self['cardContent'] = $cardContent;
        $self['cardOrientation'] = $cardOrientation;
        $self['thumbnailImageAlignment'] = $thumbnailImageAlignment;

        return $self;
    }

    /**
     * @param RcsCardContentShape $cardContent
     */
    public function withCardContent(RcsCardContent|array $cardContent): self
    {
        $self = clone $this;
        $self['cardContent'] = $cardContent;

        return $self;
    }

    /**
     * Orientation of the card.
     *
     * @param CardOrientation|value-of<CardOrientation> $cardOrientation
     */
    public function withCardOrientation(
        CardOrientation|string $cardOrientation
    ): self {
        $self = clone $this;
        $self['cardOrientation'] = $cardOrientation;

        return $self;
    }

    /**
     * Image preview alignment for standalone cards with horizontal layout.
     *
     * @param ThumbnailImageAlignment|value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    public function withThumbnailImageAlignment(
        ThumbnailImageAlignment|string $thumbnailImageAlignment
    ): self {
        $self = clone $this;
        $self['thumbnailImageAlignment'] = $thumbnailImageAlignment;

        return $self;
    }
}
