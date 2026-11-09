<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * optional initial screen and data. When omitted, the flow opens on its first entry screen. Must be omitted when flow_action is data_exchange.
 *
 * @phpstan-type FlowActionPayloadShape = array{
 *   data?: array<string,mixed>|null, screen?: string|null
 * }
 */
final class FlowActionPayload implements BaseModel
{
    /** @use SdkModel<FlowActionPayloadShape> */
    use SdkModel;

    /**
     * input data for the first screen. Must be a non-empty object when provided.
     *
     * @var array<string,mixed>|null $data
     */
    #[Optional(map: 'mixed')]
    public ?array $data;

    /**
     * ID of the first screen to show.
     */
    #[Optional]
    public ?string $screen;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $data
     */
    public static function with(?array $data = null, ?string $screen = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $screen && $self['screen'] = $screen;

        return $self;
    }

    /**
     * input data for the first screen. Must be a non-empty object when provided.
     *
     * @param array<string,mixed> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * ID of the first screen to show.
     */
    public function withScreen(string $screen): self
    {
        $self = clone $this;
        $self['screen'] = $screen;

        return $self;
    }
}
