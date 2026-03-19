<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\MessageTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WhatsappTemplateData;

/**
 * @phpstan-import-type WhatsappTemplateDataShape from \Telnyx\WhatsappTemplateData
 *
 * @phpstan-type MessageTemplateUpdateResponseShape = array{
 *   data?: null|WhatsappTemplateData|WhatsappTemplateDataShape
 * }
 */
final class MessageTemplateUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessageTemplateUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappTemplateData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappTemplateData|WhatsappTemplateDataShape|null $data
     */
    public static function with(WhatsappTemplateData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WhatsappTemplateData|WhatsappTemplateDataShape $data
     */
    public function withData(WhatsappTemplateData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
