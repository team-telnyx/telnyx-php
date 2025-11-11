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
 * @phpstan-type StandaloneCardShape = array{
 *   card_content: RcsCardContent,
 *   card_orientation: value-of<CardOrientation>,
 *   thumbnail_image_alignment: value-of<ThumbnailImageAlignment>,
 * }
 */
final class StandaloneCard implements BaseModel
{
    /** @use SdkModel<StandaloneCardShape> */
    use SdkModel;

    #[Api]
    public RcsCardContent $card_content;

    /**
     * Orientation of the card.
     *
     * @var value-of<CardOrientation> $card_orientation
     */
    #[Api(enum: CardOrientation::class)]
    public string $card_orientation;

    /**
     * Image preview alignment for standalone cards with horizontal layout.
     *
     * @var value-of<ThumbnailImageAlignment> $thumbnail_image_alignment
     */
    #[Api(enum: ThumbnailImageAlignment::class)]
    public string $thumbnail_image_alignment;

    /**
     * `new StandaloneCard()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandaloneCard::with(
     *   card_content: ..., card_orientation: ..., thumbnail_image_alignment: ...
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
     * @param CardOrientation|value-of<CardOrientation> $card_orientation
     * @param ThumbnailImageAlignment|value-of<ThumbnailImageAlignment> $thumbnail_image_alignment
     */
    public static function with(
        RcsCardContent $card_content,
        CardOrientation|string $card_orientation,
        ThumbnailImageAlignment|string $thumbnail_image_alignment,
    ): self {
        $obj = new self;

        $obj->card_content = $card_content;
        $obj['card_orientation'] = $card_orientation;
        $obj['thumbnail_image_alignment'] = $thumbnail_image_alignment;

        return $obj;
    }

    public function withCardContent(RcsCardContent $cardContent): self
    {
        $obj = clone $this;
        $obj->card_content = $cardContent;

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
        $obj['card_orientation'] = $cardOrientation;

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
        $obj['thumbnail_image_alignment'] = $thumbnailImageAlignment;

        return $obj;
    }
}
