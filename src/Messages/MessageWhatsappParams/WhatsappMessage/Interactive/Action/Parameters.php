<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters\FlowAction;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters\FlowActionPayload;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters\Mode;

/**
 * @phpstan-import-type FlowActionPayloadShape from \Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters\FlowActionPayload
 *
 * @phpstan-type ParametersShape = array{
 *   displayText?: string|null,
 *   flowAction?: null|FlowAction|value-of<FlowAction>,
 *   flowActionPayload?: null|FlowActionPayload|FlowActionPayloadShape,
 *   flowCta?: string|null,
 *   flowID?: string|null,
 *   flowMessageVersion?: string|null,
 *   flowName?: string|null,
 *   flowToken?: string|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   url?: string|null,
 * }
 */
final class Parameters implements BaseModel
{
    /** @use SdkModel<ParametersShape> */
    use SdkModel;

    /**
     * button label text, 20 character maximum.
     */
    #[Optional('display_text')]
    public ?string $displayText;

    /**
     * how the flow starts. navigate opens the screen in flow_action_payload; data_exchange requests the first screen from the business's flow endpoint. Defaults to navigate.
     *
     * @var value-of<FlowAction>|null $flowAction
     */
    #[Optional('flow_action', enum: FlowAction::class)]
    public ?string $flowAction;

    /**
     * optional initial screen and data. When omitted, the flow opens on its first entry screen. Must be omitted when flow_action is data_exchange.
     */
    #[Optional('flow_action_payload')]
    public ?FlowActionPayload $flowActionPayload;

    /**
     * text of the button that opens the flow, 1-20 characters, no emoji. Required for flow messages.
     */
    #[Optional('flow_cta')]
    public ?string $flowCta;

    /**
     * ID of the flow to open. Provide exactly one of flow_id or flow_name.
     */
    #[Optional('flow_id')]
    public ?string $flowID;

    /**
     * flow message version, must be 3. Required for flow messages.
     */
    #[Optional('flow_message_version')]
    public ?string $flowMessageVersion;

    /**
     * name of the flow to open. Provide exactly one of flow_id or flow_name.
     */
    #[Optional('flow_name')]
    public ?string $flowName;

    /**
     * business-generated identifier for the flow session. Returned in the flow response for correlation.
     */
    #[Optional('flow_token')]
    public ?string $flowToken;

    /**
     * use draft to test an unpublished flow. Defaults to published.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * button URL to load when tapped by the user.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FlowAction|value-of<FlowAction>|null $flowAction
     * @param FlowActionPayload|FlowActionPayloadShape|null $flowActionPayload
     * @param Mode|value-of<Mode>|null $mode
     */
    public static function with(
        ?string $displayText = null,
        FlowAction|string|null $flowAction = null,
        FlowActionPayload|array|null $flowActionPayload = null,
        ?string $flowCta = null,
        ?string $flowID = null,
        ?string $flowMessageVersion = null,
        ?string $flowName = null,
        ?string $flowToken = null,
        Mode|string|null $mode = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $displayText && $self['displayText'] = $displayText;
        null !== $flowAction && $self['flowAction'] = $flowAction;
        null !== $flowActionPayload && $self['flowActionPayload'] = $flowActionPayload;
        null !== $flowCta && $self['flowCta'] = $flowCta;
        null !== $flowID && $self['flowID'] = $flowID;
        null !== $flowMessageVersion && $self['flowMessageVersion'] = $flowMessageVersion;
        null !== $flowName && $self['flowName'] = $flowName;
        null !== $flowToken && $self['flowToken'] = $flowToken;
        null !== $mode && $self['mode'] = $mode;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * button label text, 20 character maximum.
     */
    public function withDisplayText(string $displayText): self
    {
        $self = clone $this;
        $self['displayText'] = $displayText;

        return $self;
    }

    /**
     * how the flow starts. navigate opens the screen in flow_action_payload; data_exchange requests the first screen from the business's flow endpoint. Defaults to navigate.
     *
     * @param FlowAction|value-of<FlowAction> $flowAction
     */
    public function withFlowAction(FlowAction|string $flowAction): self
    {
        $self = clone $this;
        $self['flowAction'] = $flowAction;

        return $self;
    }

    /**
     * optional initial screen and data. When omitted, the flow opens on its first entry screen. Must be omitted when flow_action is data_exchange.
     *
     * @param FlowActionPayload|FlowActionPayloadShape $flowActionPayload
     */
    public function withFlowActionPayload(
        FlowActionPayload|array $flowActionPayload
    ): self {
        $self = clone $this;
        $self['flowActionPayload'] = $flowActionPayload;

        return $self;
    }

    /**
     * text of the button that opens the flow, 1-20 characters, no emoji. Required for flow messages.
     */
    public function withFlowCta(string $flowCta): self
    {
        $self = clone $this;
        $self['flowCta'] = $flowCta;

        return $self;
    }

    /**
     * ID of the flow to open. Provide exactly one of flow_id or flow_name.
     */
    public function withFlowID(string $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }

    /**
     * flow message version, must be 3. Required for flow messages.
     */
    public function withFlowMessageVersion(string $flowMessageVersion): self
    {
        $self = clone $this;
        $self['flowMessageVersion'] = $flowMessageVersion;

        return $self;
    }

    /**
     * name of the flow to open. Provide exactly one of flow_id or flow_name.
     */
    public function withFlowName(string $flowName): self
    {
        $self = clone $this;
        $self['flowName'] = $flowName;

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

    /**
     * use draft to test an unpublished flow. Defaults to published.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * button URL to load when tapped by the user.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
