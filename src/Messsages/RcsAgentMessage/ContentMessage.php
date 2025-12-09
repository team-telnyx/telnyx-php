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
        $obj = new self;

        null !== $contentInfo && $obj['contentInfo'] = $contentInfo;
        null !== $richCard && $obj['richCard'] = $richCard;
        null !== $suggestions && $obj['suggestions'] = $suggestions;
        null !== $text && $obj['text'] = $text;

        return $obj;
    }

    /**
     * @param RcsContentInfo|array{
     *   fileURL: string, forceRefresh?: bool|null, thumbnailURL?: string|null
     * } $contentInfo
     */
    public function withContentInfo(RcsContentInfo|array $contentInfo): self
    {
        $obj = clone $this;
        $obj['contentInfo'] = $contentInfo;

        return $obj;
    }

    /**
     * @param RichCard|array{
     *   carouselCard?: CarouselCard|null, standaloneCard?: StandaloneCard|null
     * } $richCard
     */
    public function withRichCard(RichCard|array $richCard): self
    {
        $obj = clone $this;
        $obj['richCard'] = $richCard;

        return $obj;
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
        $obj = clone $this;
        $obj['suggestions'] = $suggestions;

        return $obj;
    }

    /**
     * Text (maximum 3072 characters).
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}
