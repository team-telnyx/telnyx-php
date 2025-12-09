<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\Messsages\RcsSuggestion;
use Telnyx\Messsages\RcsSuggestion\Action;
use Telnyx\Messsages\RcsSuggestion\Reply;

/**
 * @phpstan-type ContentMessageShape = array{
 *   contentInfo?: RcsContentInfo|null,
 *   richCard?: RichCard|null,
 *   suggestions?: list<RcsSuggestion>|null,
 *   text?: string|null,
 * }
 */
final class ContentMessage implements BaseModel
{
    /** @use SdkModel<ContentMessageShape> */
    use SdkModel;

    #[Optional('content_info')]
    public ?RcsContentInfo $contentInfo;

    #[Optional('rich_card')]
    public ?RichCard $richCard;

    /**
     * List of suggested actions and replies.
     *
     * @var list<RcsSuggestion>|null $suggestions
     */
    #[Optional(list: RcsSuggestion::class)]
    public ?array $suggestions;

    /**
     * Text (maximum 3072 characters).
     */
    #[Optional]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsContentInfo|array{
     *   fileURL: string, forceRefresh?: bool|null, thumbnailURL?: string|null
     * } $contentInfo
     * @param RichCard|array{
     *   carouselCard?: CarouselCard|null, standaloneCard?: StandaloneCard|null
     * } $richCard
     * @param list<RcsSuggestion|array{
     *   action?: Action|null, reply?: Reply|null
     * }> $suggestions
     */
    public static function with(
        RcsContentInfo|array|null $contentInfo = null,
        RichCard|array|null $richCard = null,
        ?array $suggestions = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $contentInfo && $self['contentInfo'] = $contentInfo;
        null !== $richCard && $self['richCard'] = $richCard;
        null !== $suggestions && $self['suggestions'] = $suggestions;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * @param RcsContentInfo|array{
     *   fileURL: string, forceRefresh?: bool|null, thumbnailURL?: string|null
     * } $contentInfo
     */
    public function withContentInfo(RcsContentInfo|array $contentInfo): self
    {
        $self = clone $this;
        $self['contentInfo'] = $contentInfo;

        return $self;
    }

    /**
     * @param RichCard|array{
     *   carouselCard?: CarouselCard|null, standaloneCard?: StandaloneCard|null
     * } $richCard
     */
    public function withRichCard(RichCard|array $richCard): self
    {
        $self = clone $this;
        $self['richCard'] = $richCard;

        return $self;
    }

    /**
     * List of suggested actions and replies.
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
     * Text (maximum 3072 characters).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
