<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Flow button parameters. Used with type action on a flow button component.
 *
 * @phpstan-type ActionShape = array{
 *   flowActionData?: array<string,mixed>|null, flowToken?: string|null
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    /**
     * input data for the first screen of the flow.
     *
     * @var array<string,mixed>|null $flowActionData
     */
    #[Optional('flow_action_data', map: 'mixed')]
    public ?array $flowActionData;

    /**
     * business-generated identifier for the flow session. Returned in the flow response for correlation.
     */
    #[Optional('flow_token')]
    public ?string $flowToken;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $flowActionData
     */
    public static function with(
        ?array $flowActionData = null,
        ?string $flowToken = null
    ): self {
        $self = new self;

        null !== $flowActionData && $self['flowActionData'] = $flowActionData;
        null !== $flowToken && $self['flowToken'] = $flowToken;

        return $self;
    }

    /**
     * input data for the first screen of the flow.
     *
     * @param array<string,mixed> $flowActionData
     */
    public function withFlowActionData(array $flowActionData): self
    {
        $self = clone $this;
        $self['flowActionData'] = $flowActionData;

        return $self;
    }

    /**
     * business-generated identifier for the flow session. Returned in the flow response for correlation.
     */
    public function withFlowToken(string $flowToken): self
    {
        $self = clone $this;
        $self['flowToken'] = $flowToken;

        return $self;
    }
}
