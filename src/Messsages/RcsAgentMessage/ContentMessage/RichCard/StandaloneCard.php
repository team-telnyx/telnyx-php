<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\CardOrientation;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\ThumbnailImageAlignment;
use Telnyx\Messsages\RcsCardContent;

/**
 * Standalone card.
 *
 * @phpstan-type standalone_card = array{
 *   cardContent: RcsCardContent,
 *   cardOrientation: value-of<CardOrientation>,
 *   thumbnailImageAlignment: value-of<ThumbnailImageAlignment>,
 * }
 */
final class StandaloneCard implements BaseModel
{
    /** @use SdkModel<standalone_card> */
    use SdkModel;

    #[Api('card_content')]
    public RcsCardContent $cardContent;

    /**
     * Orientation of the card.
     *
     * @var value-of<CardOrientation> $cardOrientation
     */
    #[Api('card_orientation', enum: CardOrientation::class)]
    public string $cardOrientation;

    /**
     * Image preview alignment for standalone cards with horizontal layout.
     *
     * @var value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    #[Api('thumbnail_image_alignment', enum: ThumbnailImageAlignment::class)]
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
     * @param CardOrientation|value-of<CardOrientation> $cardOrientation
     * @param ThumbnailImageAlignment|value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    public static function with(
        RcsCardContent $cardContent,
        CardOrientation|string $cardOrientation,
        ThumbnailImageAlignment|string $thumbnailImageAlignment,
    ): self {
        $obj = new self;

        $obj->cardContent = $cardContent;
        $obj['cardOrientation'] = $cardOrientation;
        $obj['thumbnailImageAlignment'] = $thumbnailImageAlignment;

        return $obj;
    }

    public function withCardContent(RcsCardContent $cardContent): self
    {
        $obj = clone $this;
        $obj->cardContent = $cardContent;

        return $obj;
    }

    /**
     * Orientation of the card.
     *
     * @param CardOrientation|value-of<CardOrientation> $cardOrientation
     */
    public function withCardOrientation(
        CardOrientation|string $cardOrientation
    ): self {
        $obj = clone $this;
        $obj['cardOrientation'] = $cardOrientation;

        return $obj;
    }

    /**
     * Image preview alignment for standalone cards with horizontal layout.
     *
     * @param ThumbnailImageAlignment|value-of<ThumbnailImageAlignment> $thumbnailImageAlignment
     */
    public function withThumbnailImageAlignment(
        ThumbnailImageAlignment|string $thumbnailImageAlignment
    ): self {
        $obj = clone $this;
        $obj['thumbnailImageAlignment'] = $thumbnailImageAlignment;

        return $obj;
    }
}
