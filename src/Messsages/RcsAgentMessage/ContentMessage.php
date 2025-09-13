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
 * @phpstan-type content_message = array{
 *   contentInfo?: RcsContentInfo,
 *   richCard?: RichCard,
 *   suggestions?: list<RcsSuggestion>,
 *   text?: string,
 * }
 */
final class ContentMessage implements BaseModel
{
    /** @use SdkModel<content_message> */
    use SdkModel;

    #[Api('content_info', optional: true)]
    public ?RcsContentInfo $contentInfo;

    #[Api('rich_card', optional: true)]
    public ?RichCard $richCard;

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
        ?RcsContentInfo $contentInfo = null,
        ?RichCard $richCard = null,
        ?array $suggestions = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        null !== $contentInfo && $obj->contentInfo = $contentInfo;
        null !== $richCard && $obj->richCard = $richCard;
        null !== $suggestions && $obj->suggestions = $suggestions;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    public function withContentInfo(RcsContentInfo $contentInfo): self
    {
        $obj = clone $this;
        $obj->contentInfo = $contentInfo;

        return $obj;
    }

    public function withRichCard(RichCard $richCard): self
    {
        $obj = clone $this;
        $obj->richCard = $richCard;

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
