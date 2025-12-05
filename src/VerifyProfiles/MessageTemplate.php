<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MessageTemplateShape = array{
 *   data?: VerifyProfileMessageTemplateResponse|null
 * }
 */
final class MessageTemplate implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessageTemplateShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?VerifyProfileMessageTemplateResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerifyProfileMessageTemplateResponse|array{
     *   id?: string|null, text?: string|null
     * } $data
     */
    public static function with(
        VerifyProfileMessageTemplateResponse|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param VerifyProfileMessageTemplateResponse|array{
     *   id?: string|null, text?: string|null
     * } $data
     */
    public function withData(
        VerifyProfileMessageTemplateResponse|array $data
    ): self {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
