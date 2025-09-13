<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsCardContent\Media;

/**
 * @phpstan-type rcs_card_content = array{
 *   description?: string,
 *   media?: Media,
 *   suggestions?: list<RcsSuggestion>,
 *   title?: string,
 * }
 */
final class RcsCardContent implements BaseModel
{
    /** @use SdkModel<rcs_card_content> */
    use SdkModel;

    /**
     * Description of the card (at most 2000 characters).
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * A media file within a rich card.
     */
    #[Api(optional: true)]
    public ?Media $media;

    /**
     * List of suggestions to include in the card. Maximum 10 suggestions.
     *
     * @var list<RcsSuggestion>|null $suggestions
     */
    #[Api(list: RcsSuggestion::class, optional: true)]
    public ?array $suggestions;

    /**
     * Title of the card (at most 200 characters).
     */
    #[Api(optional: true)]
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
     * @param list<RcsSuggestion> $suggestions
     */
    public static function with(
        ?string $description = null,
        ?Media $media = null,
        ?array $suggestions = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        null !== $description && $obj->description = $description;
        null !== $media && $obj->media = $media;
        null !== $suggestions && $obj->suggestions = $suggestions;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    /**
     * Description of the card (at most 2000 characters).
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * A media file within a rich card.
     */
    public function withMedia(Media $media): self
    {
        $obj = clone $this;
        $obj->media = $media;

        return $obj;
    }

    /**
     * List of suggestions to include in the card. Maximum 10 suggestions.
     *
     * @param list<RcsSuggestion> $suggestions
     */
    public function withSuggestions(array $suggestions): self
    {
        $obj = clone $this;
        $obj->suggestions = $suggestions;

        return $obj;
    }

    /**
     * Title of the card (at most 200 characters).
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
