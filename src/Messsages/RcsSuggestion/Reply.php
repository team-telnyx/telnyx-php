<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReplyShape = array{
 *   postback_data?: string|null, text?: string|null
 * }
 */
final class Reply implements BaseModel
{
    /** @use SdkModel<ReplyShape> */
    use SdkModel;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Api(optional: true)]
    public ?string $postback_data;

    /**
     * Text that is shown in the suggested reply (maximum 25 characters).
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
     */
    public static function with(
        ?string $postback_data = null,
        ?string $text = null
    ): self {
        $obj = new self;

        null !== $postback_data && $obj->postback_data = $postback_data;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $obj = clone $this;
        $obj->postback_data = $postbackData;

        return $obj;
    }

    /**
     * Text that is shown in the suggested reply (maximum 25 characters).
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
