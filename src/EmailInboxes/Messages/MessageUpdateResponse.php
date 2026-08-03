<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\InboundMessage;

/**
 * @phpstan-import-type InboundMessageShape from \Telnyx\Webhooks\InboundMessage
 *
 * @phpstan-type MessageUpdateResponseShape = array{
 *   data: InboundMessage|InboundMessageShape
 * }
 */
final class MessageUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessageUpdateResponseShape> */
    use SdkModel;

    #[Required]
    public InboundMessage $data;

    /**
     * `new MessageUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageUpdateResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundMessage|InboundMessageShape $data
     */
    public static function with(InboundMessage|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param InboundMessage|InboundMessageShape $data
     */
    public function withData(InboundMessage|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
