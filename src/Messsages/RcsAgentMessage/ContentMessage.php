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
 *   content_info?: RcsContentInfo|null,
 *   rich_card?: RichCard|null,
 *   suggestions?: list<RcsSuggestion>|null,
 *   text?: string|null,
 * }
 */
final class ContentMessage implements BaseModel
{
    /** @use SdkModel<ContentMessageShape> */
    use SdkModel;

    #[Optional]
    public ?RcsContentInfo $content_info;

    #[Optional]
    public ?RichCard $rich_card;

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
     *   file_url: string, force_refresh?: bool|null, thumbnail_url?: string|null
     * } $content_info
     * @param RichCard|array{
     *   carousel_card?: CarouselCard|null, standalone_card?: StandaloneCard|null
     * } $rich_card
     * @param list<RcsSuggestion|array{
     *   action?: Action|null, reply?: Reply|null
     * }> $suggestions
     */
    public static function with(
        RcsContentInfo|array|null $content_info = null,
        RichCard|array|null $rich_card = null,
        ?array $suggestions = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        null !== $content_info && $obj['content_info'] = $content_info;
        null !== $rich_card && $obj['rich_card'] = $rich_card;
        null !== $suggestions && $obj['suggestions'] = $suggestions;
        null !== $text && $obj['text'] = $text;

        return $obj;
    }

    /**
     * @param RcsContentInfo|array{
     *   file_url: string, force_refresh?: bool|null, thumbnail_url?: string|null
     * } $contentInfo
     */
    public function withContentInfo(RcsContentInfo|array $contentInfo): self
    {
        $obj = clone $this;
        $obj['content_info'] = $contentInfo;

        return $obj;
    }

    /**
     * @param RichCard|array{
     *   carousel_card?: CarouselCard|null, standalone_card?: StandaloneCard|null
     * } $richCard
     */
    public function withRichCard(RichCard|array $richCard): self
    {
        $obj = clone $this;
        $obj['rich_card'] = $richCard;

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
