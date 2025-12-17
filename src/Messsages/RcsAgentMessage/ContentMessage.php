<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\Messsages\RcsSuggestion;

/**
 * @phpstan-import-type RcsContentInfoShape from \Telnyx\Messsages\RcsContentInfo
 * @phpstan-import-type RichCardShape from \Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard
 * @phpstan-import-type RcsSuggestionShape from \Telnyx\Messsages\RcsSuggestion
 *
 * @phpstan-type ContentMessageShape = array{
 *   contentInfo?: null|RcsContentInfo|RcsContentInfoShape,
 *   richCard?: null|RichCard|RichCardShape,
 *   suggestions?: list<RcsSuggestionShape>|null,
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
     * @param RcsContentInfoShape $contentInfo
     * @param RichCardShape $richCard
     * @param list<RcsSuggestionShape> $suggestions
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
     * @param RcsContentInfoShape $contentInfo
     */
    public function withContentInfo(RcsContentInfo|array $contentInfo): self
    {
        $self = clone $this;
        $self['contentInfo'] = $contentInfo;

        return $self;
    }

    /**
     * @param RichCardShape $richCard
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
     * @param list<RcsSuggestionShape> $suggestions
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
