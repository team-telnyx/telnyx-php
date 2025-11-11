<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\Messsages\RcsSuggestion;

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

    #[Api(optional: true)]
    public ?RcsContentInfo $content_info;

    #[Api(optional: true)]
    public ?RichCard $rich_card;

    /**
     * List of suggested actions and replies.
     *
     * @var list<RcsSuggestion>|null $suggestions
     */
    #[Api(list: RcsSuggestion::class, optional: true)]
    public ?array $suggestions;

    /**
     * Text (maximum 3072 characters).
     */
    #[Api(optional: true)]
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
     * @param list<RcsSuggestion> $suggestions
     */
    public static function with(
        ?RcsContentInfo $content_info = null,
        ?RichCard $rich_card = null,
        ?array $suggestions = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        null !== $content_info && $obj->content_info = $content_info;
        null !== $rich_card && $obj->rich_card = $rich_card;
        null !== $suggestions && $obj->suggestions = $suggestions;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    public function withContentInfo(RcsContentInfo $contentInfo): self
    {
        $obj = clone $this;
        $obj->content_info = $contentInfo;

        return $obj;
    }

    public function withRichCard(RichCard $richCard): self
    {
        $obj = clone $this;
        $obj->rich_card = $richCard;

        return $obj;
    }

    /**
     * List of suggested actions and replies.
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
     * Text (maximum 3072 characters).
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
