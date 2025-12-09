<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsCardContent\Media;
use Telnyx\Messsages\RcsCardContent\Media\Height;
use Telnyx\Messsages\RcsSuggestion\Action;
use Telnyx\Messsages\RcsSuggestion\Reply;

/**
 * @phpstan-type RcsCardContentShape = array{
 *   description?: string|null,
 *   media?: Media|null,
 *   suggestions?: list<RcsSuggestion>|null,
 *   title?: string|null,
 * }
 */
final class RcsCardContent implements BaseModel
{
    /** @use SdkModel<RcsCardContentShape> */
    use SdkModel;

    /**
     * Description of the card (at most 2000 characters).
     */
    #[Optional]
    public ?string $description;

    /**
     * A media file within a rich card.
     */
    #[Optional]
    public ?Media $media;

    /**
     * List of suggestions to include in the card. Maximum 10 suggestions.
     *
     * @var list<RcsSuggestion>|null $suggestions
     */
    #[Optional(list: RcsSuggestion::class)]
    public ?array $suggestions;

    /**
     * Title of the card (at most 200 characters).
     */
    #[Optional]
    public ?string $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Media|array{
     *   contentInfo?: RcsContentInfo|null, height?: value-of<Height>|null
     * } $media
     * @param list<RcsSuggestion|array{
     *   action?: Action|null, reply?: Reply|null
     * }> $suggestions
     */
    public static function with(
        ?string $description = null,
        Media|array|null $media = null,
        ?array $suggestions = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $media && $self['media'] = $media;
        null !== $suggestions && $self['suggestions'] = $suggestions;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * Description of the card (at most 2000 characters).
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * A media file within a rich card.
     *
     * @param Media|array{
     *   contentInfo?: RcsContentInfo|null, height?: value-of<Height>|null
     * } $media
     */
    public function withMedia(Media|array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    /**
     * List of suggestions to include in the card. Maximum 10 suggestions.
     *
     * @param list<RcsSuggestion|array{
     *   action?: Action|null, reply?: Reply|null
     * }> $suggestions
     */
    public function withSuggestions(array $suggestions): self
    {
        $self = clone $this;
        $self['suggestions'] = $suggestions;

        return $self;
    }

    /**
     * Title of the card (at most 200 characters).
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
